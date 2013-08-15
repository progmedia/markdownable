<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * P
 */
class P implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        return PHP_EOL . PHP_EOL . $node->nodeValue . PHP_EOL;
    }
}
