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
        $nodes = $node->parentNode->childNodes;
        $total = $nodes->length;

        for ($i = 0; $i < $total; $i++) {
            $current = $nodes->item($i);

            if ($current->isSameNode($node)) {
                return $i / 2 + 1;
            }
        }
    }
}
