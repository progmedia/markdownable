<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * Hr
 */
class Hr implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        return PHP_EOL . PHP_EOL . '- - - - - -' . PHP_EOL . PHP_EOL;
    }
}
