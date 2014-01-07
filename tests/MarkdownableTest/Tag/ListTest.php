<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace MarkdownableTest;

class ListTest extends \PHPUnit_Framework_Testcase
{
    public function testConvertsUlListTag()
    {
        $html = <<<EOD
<ul>
<li>Item 1</li>
<li>Item 2</li>
</ul>
EOD;

        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('ul')->item(0);

        $parser = new \Markdownable\Tag\Li;

        $output = '';

        foreach ($tag->childNodes as $child) {
            if ($child instanceof \DOMElement) {
                $output .= $parser->parse($child);
            }
        }

        $this->assertSame($output, '- Item 1' . PHP_EOL . '- Item 2' . PHP_EOL);
    }

    public function testConvertsOlListTag()
    {
        $html = <<<EOD
<ol>
<li>Item 1</li>
<li>Item 2</li>
<li>Item 3</li>
</ol>
EOD;

        $doc = new \DomDocument;
        $doc->loadHtml($html);
        $tag = $doc->getElementsByTagName('ol')->item(0);

        $parser = new \Markdownable\Tag\Li;

        $output = '';

        foreach ($tag->childNodes as $child) {
            if ($child instanceof \DOMElement) {
                $output .= $parser->parse($child);
            }
        }

        $this->assertSame($output, '1. Item 1' . PHP_EOL . '2. Item 2' . PHP_EOL . '3. Item 3' . PHP_EOL);
    }
}
