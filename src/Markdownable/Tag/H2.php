<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * H2
 */
class H2 extends AbstractHeader implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node, $repeat = 1)
    {
        return parent::parse($node, 2);
    }
}
