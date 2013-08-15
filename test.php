<?php
include __DIR__ . '/vendor/autoload.php';

$html = <<<'HTML'
        <h1>Header 1</h1>
        <h2>Header 2</h2>
        <h3>Header 3</h3>
        <h4>Header 4</h4>
        <h5>Header 5</h5>
        <h6>Header 6</h6>
        <img src="some-image.jpg" alt="Some Image" />
        <br />
        <img src="some-image2.jpg" alt="Some Image 2" title="Image with a title" />
        <p>Some text paragraph <a href="some.html">with a link without a title</a></p>
        <p>Another text paragraph <a href="some.html" title="with a title">with a link with a title</a></p>
        <ul>
            <li>Unordered List Item 1</li>
            <li>Unordered List Item 2</li>
        </ul>
        <hr />
        <ol>
            <li>Ordered List Item 1</li>
            <li>Ordered List Item 2</li>
            <li>Ordered List Item 3</li>
            <li>Ordered List Item 4</li>
            <li>Ordered List Item 5</li>
            <li>Ordered List Item 6</li>
            <li>Ordered List Item 7</li>
            <li>Ordered List Item 8</li>
            <li>Ordered List Item 9</li>
            <li>Ordered List Item 10</li>
        </ol>

        <blockquote>
            <p>Some paragraph in a blockquote</p>
            <p>Another paragraph in a blockquote</p>
            Normal text in a blockquote with inlne <code>something()</code>
        </blockquote>

        <pre>
            <code>
                class Foo
                {
                    public function hello();
                }

                class Bar
                {

                }
            </code>
        </pre>
HTML;

$c = new Markdownable\Converter(new DomDocument);

echo $c->convert($html);
