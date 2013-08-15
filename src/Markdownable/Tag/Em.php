<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * Em
 */
class Em implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        return '*' . $node->nodeValue . '*';
    }
}
