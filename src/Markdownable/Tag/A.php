<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * A
 */
class A implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        $href  = $node->getAttribute('href');
        $title = ($node->getAttribute('title') !== '') ? ' "' . $node->getAttribute('title') . '"' : '';

        return '[' . $node->nodeValue . '](' . $href . $title . ')';
    }
}
