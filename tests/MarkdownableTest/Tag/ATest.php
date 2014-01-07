<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace MarkdownableTest;

class ATest extends \PHPUnit_Framework_Testcase
{
    public function testConvertsAnchorTag()
    {
        $html = '<a href="http://example.com">link</a>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('a')->item(0);

        $parser = new \Markdownable\Tag\A;

        $this->assertSame($parser->parse($tag), '[link](http://example.com)');
    }

    public function testConvertsAnchorTagWithTitle()
    {
        $html = '<a href="http://example.com" title="A Link">link</a>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('a')->item(0);

        $parser = new \Markdownable\Tag\A;

        $this->assertSame($parser->parse($tag), '[link](http://example.com "A Link")');
    }
}
