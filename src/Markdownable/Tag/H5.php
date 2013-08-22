<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * H5
 */
class H5 extends AbstractHeader implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node, $repeat = 1)
    {
        return parent::parse($node, 5);
    }
}
