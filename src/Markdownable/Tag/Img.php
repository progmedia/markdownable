<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * Img
 */
class Img implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        $alt = $node->getAttribute('alt');
        $src = $node->getAttribute('src');
        $title = ($node->getAttribute('title') != '') ? ' "' . $node->getAttribute('title') . '"' : '';

        return '![' . $alt . '](' . $src . $title . ')';
    }
}
