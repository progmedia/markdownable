<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * ParserInterface
 */
interface ParserInterface
{
    /**
     * Parse a HTML node in to markdown syntax
     *
     * @param  object $value
     * @return string
     */
    public function parse($node);
}
