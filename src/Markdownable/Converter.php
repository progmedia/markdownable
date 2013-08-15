<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable;

/**
 * Converter
 */
class Converter
{
    const NEWLINE = PHP_EOL;

    /**
     * @var \DomDocument
     */
    protected $doc;

    /**
     * Array of valid tags
     *
     * @var array
     */
    protected $markdownable = [
        'p',
        'pre',
        'code',
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'h6',
        'em',
        'i',
        'strong',
        'b',
        'hr',
        'br',
        'blockquote',
        'ol',
        'ul',
        'li',
        'img',
        'a'
    ];

    /**
     * @var array
     */
    protected $parsers = [];

    /**
     * Constructor
     *
     * @param \DomDocument
     */
    public function __construct(\DomDocument $doc, $html = null)
    {
        $this->doc  = $doc;
        $this->html = $html;

        foreach ($this->markdownable as $tag) {
            $parser = '\\Markdownable\\Tag\\' . ucfirst($tag);
            $this->addTagParser($tag, new $parser);
        }
    }

    /**
     * Traverse a string of HTML and proxy out to convert markdownable tags
     *
     * @param  string $html
     * @return string
     */
    public function convert($html = null)
    {
        if (! is_null($html)) {
            $this->html = $html;
        }

        if (is_null($this->html)) {
            throw new Exception\NotTraversableException(
                'No HTML was provided to traverse'
            );
        }

        $this->doc->loadHTML('<?xml encoding="UTF-8">' . $this->html);
        $this->doc->encoding = 'UTF-8';
        $body = $this->doc->getElementsByTagName("body")->item(0);

        $this->convertRecursive($body);

        $markdown = $this->doc->saveHtml();
        $markdown = html_entity_decode($markdown, ENT_QUOTES, 'UTF-8');
        $markdown = preg_replace('/<!DOCTYPE [^>]+>/', null, $markdown);
        $unwanted = ['<html>', '</html>', '<body>', '</body>', '<?xml encoding="UTF-8">', '&#xD;'];
        $markdown = str_replace($unwanted, null, $markdown);
        $markdown = trim($markdown, "\n\r\0\x0B") . PHP_EOL;
        $markdown = preg_replace('/(?:(?:\r\n|\r|\n)\s*){2}/s', "\n\n", $markdown);

        return $markdown;
    }

    /**
     * Recursively walk the node and build the markdown
     *
     * @param  object $node
     * @return void
     */
    protected function convertRecursive($node)
    {
        if ($this->isInCodeBlock($node)) {
            return;
        }

        if ($node->hasChildNodes()) {
            $length = $node->childNodes->length;

            for ($i = 0; $i < $length; $i++) {
                $child = $node->childNodes->item($i);
                $this->convertRecursive($child);
            }
        }

        $this->buildMarkdown($node);
    }

    /**
     * Proxy out to the parser and convert HTML node to Markdown node, ignores
     * nodes not in the $markdownable array
     *
     * @param  object $node
     * @return void
     */
    public function buildMarkdown($node)
    {
        if (! isset($this->parsers[$node->nodeName]) && $node->nodeName !== '#text') {
            return;
        }

        if ($node->nodeName === '#text') {
            $markdown = preg_replace('~\s+~', ' ', $node->nodeValue);
        } else {
            $markdown = $this->parsers[$node->nodeName]->parse($node);
        }

        $markdownNode = $this->doc->createTextNode(ltrim($markdown, ' '));
        $node->parentNode->replaceChild($markdownNode, $node);
    }

    /**
     * Add a parser to the stack of tags
     *
     * @throws \Markdownable\Exception\NotMarkdownableException
     * @param  string                            $tag
     * @param  \Markdownable\Tag\ParserInterface $object
     * @return \Markdownable\Converter
     */
    public function addTagParser($tag, Tag\ParserInterface $object)
    {
        if (! in_array($tag, $this->markdownable)) {
            throw new Exception\NotMarkdownableException(
                sprintf('The HTML tag <%s /> is not valid in markdown syntax', $tag)
            );
        }

        $this->parsers[$tag] = $object;

        return $this;
    }

    /**
     * Determine if a node is within a code block and there fore do not convert
     *
     * @param  object  $node
     * @return boolean
     */
    public function isInCodeBlock($node)
    {
        for ($p = $node->parentNode; $p !== false; $p = $p->parentNode) {
            if (is_null($p)) {
                return false;
            }

            if ($p->nodeName === 'code') {
                return true;
            }
        }

        return false;
    }
}
