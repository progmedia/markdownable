<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

use Markdownable\Converter;

/**
 * Br
 */
class Br implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        return PHP_EOL;
    }
}
