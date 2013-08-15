<?php
/**
 * Markdownable
 *
 * @author  Phil Bennett (@philipobenito)
 * @license MIT (see LICENSE file)
 */
namespace Markdownable\Tag;

/**
 * Code
 */
class Code implements ParserInterface
{
    /**
     * {@inheritdoc}
     */
    public function parse($node)
    {
        $content = html_entity_decode($node->ownerDocument->saveHtml($node));
        $content = str_replace(['<code>', '</code>'], null, $content);

        $lines = preg_split('/\r\n|\r|\n/', $content);
        $total = count($lines);

        if ($total > 1) {
            $first = trim($lines[0]);
            $last  = trim($lines[$total - 1]);
            $first = trim($first, "&#xD;");
            $last  = trim($last, "&#xD;");

            if (empty($first)) {
                array_shift($lines);
            }

            if (empty($last)) {
                array_pop($lines);
            }

            $markdown = '~~~' . PHP_EOL;

            $i = 0;

            foreach ($lines as $line) {
                if ($i === 0) {
                    $spaces = strspn($line, ' ');
                }

                $markdown .= substr($line, $spaces) . PHP_EOL;

                $i++;
            }

            $markdown .= '~~~';

            return PHP_EOL . PHP_EOL . $markdown . PHP_EOL . PHP_EOL;
        }

        return '`' . $lines[0] . '`';
    }
}
