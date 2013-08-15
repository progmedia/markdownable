<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * Pre
 */
class Pre implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        return PHP_EOL . PHP_EOL . trim($node->nodeValue) . PHP_EOL . PHP_EOL;
    }
}
