<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * Ul
 */
class Ul extends Ol implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        return parent::parse($node);
    }
}
