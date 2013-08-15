<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * B
 */
class B extends Strong implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        return parent::parse($node);
    }
}
