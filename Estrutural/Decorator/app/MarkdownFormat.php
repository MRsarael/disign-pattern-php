<?php

/**
 * Esta classe é um decorador do decorador TextFormat.
 * TextFormat pode ser visto como uma classe auxiliar, que realiza a agregação do objeto decorado tipo InputFormat
 */
class MarkdownFormat extends TextFormat
{
    /**
     * Decorando o método formatText
     */
    public function formatText(string $text): string
    {
        $text = parent::formatText($text);
        $chunks = preg_split('|\n\n|', $text);

        foreach ($chunks as &$chunk) {
            if (preg_match('|^#+|', $chunk)) {
                $chunk = preg_replace_callback('|^(#+)(.*?)$|', function ($matches) {
                    $h = strlen($matches[1]);
                    return "<h$h>" . trim($matches[2]) . "</h$h>";
                }, $chunk);
            } else {
                $chunk = "<p>$chunk</p>";
            }
        }

        $text = implode("\n\n", $chunks);
        
        $text = preg_replace("|__(.*?)__|", '<strong>$1</strong>', $text);
        $text = preg_replace("|\*\*(.*?)\*\*|", '<strong>$1</strong>', $text);
        $text = preg_replace("|_(.*?)_|", '<em>$1</em>', $text);
        $text = preg_replace("|\*(.*?)\*|", '<em>$1</em>', $text);

        return $text;
    }
}

