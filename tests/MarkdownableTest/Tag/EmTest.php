<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace MarkdownableTest;

class EmTest extends \PHPUnit_Framework_Testcase
{
    public function testConvertsEmTag()
    {
        $html = '<em>text</em>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('em')->item(0);

        $parser = new \Markdownable\Tag\Em;

        $this->assertSame($parser->parse($tag), '*text*');
    }
}
