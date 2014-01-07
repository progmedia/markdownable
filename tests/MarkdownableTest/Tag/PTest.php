<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace MarkdownableTest;

class PTest extends \PHPUnit_Framework_Testcase
{
    public function testConvertsPTag()
    {
        $html = '<p>A paragraph of text</p>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('p')->item(0);

        $parser = new \Markdownable\Tag\P;

        $this->assertSame($parser->parse($tag), PHP_EOL . PHP_EOL . 'A paragraph of text' . PHP_EOL);
    }
}
