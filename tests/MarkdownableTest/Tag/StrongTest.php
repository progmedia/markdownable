<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace MarkdownableTest;

class StrongTest extends \PHPUnit_Framework_Testcase
{
    public function testConvertsStrongTag()
    {
        $html = '<strong>some text</strong>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('strong')->item(0);

        $parser = new \Markdownable\Tag\Strong;

        $this->assertSame($parser->parse($tag), '**some text**');
    }
}
