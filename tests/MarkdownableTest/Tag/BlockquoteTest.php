<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace MarkdownableTest;

class BlockquoteTest extends \PHPUnit_Framework_Testcase
{
    public function testConvertsBlockquoteTag()
    {
        $html = '<blockquote>Some paragraph of text</blockquote>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('blockquote')->item(0);

        $parser = new \Markdownable\Tag\Blockquote;

        $this->assertSame(
            $parser->parse($tag),
            PHP_EOL . PHP_EOL . '> Some paragraph of text' . PHP_EOL . PHP_EOL
        );
    }

    public function testConvertsMultilineBlockquoteTag()
    {
        $html = <<<EOD
<blockquote>
Some line of text
Another line of text
</blockquote>
EOD;

        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('blockquote')->item(0);

        $parser = new \Markdownable\Tag\Blockquote;

        $this->assertSame(
            $parser->parse($tag),
            PHP_EOL . PHP_EOL . '> Some line of text' . PHP_EOL . '> Another line of text' . PHP_EOL . PHP_EOL
        );
    }
}
