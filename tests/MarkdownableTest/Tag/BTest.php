<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace MarkdownableTest;

class BTest extends \PHPUnit_Framework_Testcase
{
    public function testConvertsBoldTag()
    {
        $html = '<b>some text</b>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('b')->item(0);

        $parser = new \Markdownable\Tag\B;

        $this->assertSame($parser->parse($tag), '**some text**');
    }
}
