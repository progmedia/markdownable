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
 * Li
 */
class Li implements ParserInterface
{
    protected $position = 0;

    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        $type = $node->parentNode->nodeName;

        if ($type === 'ul') {
            return '- ' . trim($node->nodeValue) . PHP_EOL;
        }

        $num = $this->getPosition($node);

        return $num . '. ' . $node->nodeValue . PHP_EOL;
    }

    /**
     * Return the list number of a given list node
     *
     * @param  object $node
     * @return integer
     */
    protected function getPosition($node)
    {
        $first = $node->parentNode->firstChild;

        if ($first->isSameNode($node)) {
            $this->position = 0;
        }

        $this->position++;

        return $this->position;
    }
}
