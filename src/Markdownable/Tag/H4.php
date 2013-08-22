<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * H4
 */
class H4 extends AbstractHeader implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node, $repeat = 1)
    {
        return parent::parse($node, 4);
    }
}
