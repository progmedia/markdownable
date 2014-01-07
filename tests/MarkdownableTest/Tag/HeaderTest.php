<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace MarkdownableTest;

class HeaderTest extends \PHPUnit_Framework_Testcase
{
    public function testConvertsH1Tag()
    {
        $html = '<h1>Header 1</h1>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('h1')->item(0);

        $parser = new \Markdownable\Tag\H1;

        $this->assertSame($parser->parse($tag), PHP_EOL . PHP_EOL . '# Header 1' . PHP_EOL . PHP_EOL);
    }

    public function testConvertsH2Tag()
    {
        $html = '<h2>Header 2</h2>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('h2')->item(0);

        $parser = new \Markdownable\Tag\H2;

        $this->assertSame($parser->parse($tag), PHP_EOL . PHP_EOL . '## Header 2' . PHP_EOL . PHP_EOL);
    }

    public function testConvertsH3Tag()
    {
        $html = '<h3>Header 3</h3>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('h3')->item(0);

        $parser = new \Markdownable\Tag\H3;

        $this->assertSame($parser->parse($tag), PHP_EOL . PHP_EOL . '### Header 3' . PHP_EOL . PHP_EOL);
    }

    public function testConvertsH4Tag()
    {
        $html = '<h4>Header 4</h4>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('h4')->item(0);

        $parser = new \Markdownable\Tag\H4;

        $this->assertSame($parser->parse($tag), PHP_EOL . PHP_EOL . '#### Header 4' . PHP_EOL . PHP_EOL);
    }

    public function testConvertsH5Tag()
    {
        $html = '<h5>Header 5</h5>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('h5')->item(0);

        $parser = new \Markdownable\Tag\H5;

        $this->assertSame($parser->parse($tag), PHP_EOL . PHP_EOL . '##### Header 5' . PHP_EOL . PHP_EOL);
    }

    public function testConvertsH6Tag()
    {
        $html = '<h6>Header 6</h6>';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('h6')->item(0);

        $parser = new \Markdownable\Tag\H6;

        $this->assertSame($parser->parse($tag), PHP_EOL . PHP_EOL . '###### Header 6' . PHP_EOL . PHP_EOL);
    }
}
