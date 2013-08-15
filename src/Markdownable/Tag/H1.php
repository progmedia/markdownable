<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * H1
 */
class H1 extends AbstractHeader implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        return parent::parse($node, 1);
    }
}
