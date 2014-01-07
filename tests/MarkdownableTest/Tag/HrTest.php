<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace MarkdownableTest;

class HrTest extends \PHPUnit_Framework_Testcase
{
    public function testConvertsXhtmlHrTag()
    {
        $html = '<hr />';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('hr')->item(0);

        $parser = new \Markdownable\Tag\Hr;

        $this->assertSame($parser->parse($tag), PHP_EOL . PHP_EOL . '- - - - - -' . PHP_EOL . PHP_EOL);
    }

    public function testConvertsHtmlHrTag()
    {
        $html = '<hr>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('hr')->item(0);

        $parser = new \Markdownable\Tag\Hr;

        $this->assertSame($parser->parse($tag), PHP_EOL . PHP_EOL . '- - - - - -' . PHP_EOL . PHP_EOL);
    }
}
