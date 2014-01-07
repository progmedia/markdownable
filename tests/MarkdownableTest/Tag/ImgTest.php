<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace MarkdownableTest;

class ImgTest extends \PHPUnit_Framework_Testcase
{
    public function testConvertsImgTag()
    {
        $html = '<img src="img.png" alt="">';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('img')->item(0);

        $parser = new \Markdownable\Tag\Img;

        $this->assertSame($parser->parse($tag), '![](img.png)');
    }

    public function testConvertsImgTagWithTitle()
    {
        $html = '<img src="img.png" alt="alt text" title="An Image" />';
        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('img')->item(0);

        $parser = new \Markdownable\Tag\Img;

        $this->assertSame($parser->parse($tag), '![alt text](img.png "An Image")');
    }
}
