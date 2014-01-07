<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * Blockquote
 */
class Blockquote implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        $content = trim($node->nodeValue);

        $lines = preg_split('/\r\n|\r|\n/', $content);
        $lines = array_filter($lines);

        $markdown = '';

        foreach ($lines as $line) {
            $markdown .= '> ' . $line . PHP_EOL;
        }

        return PHP_EOL . PHP_EOL . $markdown . PHP_EOL;
    }
}
