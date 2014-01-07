<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace MarkdownableTest;

class ITest extends \PHPUnit_Framework_Testcase
{
    public function testConvertsITag()
    {
        $html = '<i>text</i>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('i')->item(0);

        $parser = new \Markdownable\Tag\I;

        $this->assertSame($parser->parse($tag), '*text*');
    }
}
