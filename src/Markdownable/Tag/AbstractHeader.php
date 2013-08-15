<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * AbstractHeader
 */
abstract class AbstractHeader
{
    /**
     * {@inheritdoc}
     */
    public function parse($node, $repeat = 1)
    {
        return PHP_EOL . PHP_EOL . str_repeat('#', $repeat) . ' ' . $node->nodeValue . PHP_EOL . PHP_EOL;
    }
}
