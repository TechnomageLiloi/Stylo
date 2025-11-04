<?php

namespace Liloi\Stylo;

/**
 * Stylo parser.
 */
class Parser
{
    private static function parse(array $input): array
    {
        $output = [];

        foreach ($input as $row)
        {
            if($row === '---')
            {
                $output[] = '<hr/>';
                continue;
            }

            if(strpos($row, '//') === 0)
            {
                continue;
            }

            $row = preg_replace('/\[(.*?)\]\{(.*?)\}/', "<a class='button-trigger' href='javascript:void(0)' data-key='$2'>$1</a>", $row);
            $row = preg_replace('/\!\[(.*?)\]\((.*?)\)/', "<img src='$2' alt='$1' />", $row);
            $row = preg_replace('/\[(.*?)\]\((.*?)\)/', "<a href='$2'>$1</a>", $row);
            $row = preg_replace('/\*\*(.*?)\*\*/', "<b>$1</b>", $row);
            $row = preg_replace('/__(.*?)__/', "<i>$1</i>", $row);
            $row = preg_replace('/\%\%(.*?)\%\%/', "<s>$1</s>", $row);
            $row = preg_replace('/\^\^(.*?)\^\^/', "<u>$1</u>", $row);
            $row = preg_replace('/^-\[ \](.*)/', "<input type='checkbox' readonly>$1", $row);
            $row = preg_replace('/^-\[x\](.*)/', "<input type='checkbox' checked='checked' readonly>$1", $row);

            if(isset($row[0]) && $row[0] === '#')
            {
                $row = preg_replace('/^##### (.*)/', "<h5>$1</h5>", $row);
                $row = preg_replace('/^#### (.*)/', "<h4>$1</h4>", $row);
                $row = preg_replace('/^### (.*)/', "<h3>$1</h3>", $row);
                $row = preg_replace('/^## (.*)/', "<h2>$1</h2>", $row);
                $row = preg_replace('/^# (.*)/', "<h1>$1</h1>", $row);
                $output[] = $row;
                continue;
            }

            $output[] = '<p>' . $row . '</p>';
        }

        return $output;
    }

    public static function parseString($input)
    {
        return implode("\n", self::parse(explode("\n", $input)));
    }
}