<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace MarkdownableTest;

class BrTest extends \PHPUnit_Framework_Testcase
{
    public function testConvertsXhtmlBrTag()
    {
        $html = '<br />';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('br')->item(0);

        $parser = new \Markdownable\Tag\Br;

        $this->assertSame($parser->parse($tag), PHP_EOL);
    }

    public function testConvertsHtmlBrTag()
    {
        $html = '<br>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('br')->item(0);

        $parser = new \Markdownable\Tag\Br;

        $this->assertSame($parser->parse($tag), PHP_EOL);
    }
}
