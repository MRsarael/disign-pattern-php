<?php

/**
 * Esta classe é um decorador do decorador TextFormat.
 * TextFormat pode ser visto como uma classe auxiliar, que realiza a agregação do objeto decorado tipo InputFormat
 */
class DangerousHTMLTagsFilter extends TextFormat
{
    private $dangerousTagPatterns = ["|<script.*?>([\s\S]*)?</script>|i"];
    private $dangerousAttributes = ["onclick", "onkeypress"];

    /**
     * Decorando o método formatText
     */
    public function formatText(string $text): string
    {
        $text = parent::formatText($text);

        foreach ($this->dangerousTagPatterns as $pattern) {
            $text = preg_replace($pattern, '', $text);
        }

        foreach ($this->dangerousAttributes as $attribute) {
            $text = preg_replace_callback('|<(.*?)>|', function ($matches) use ($attribute) {
                $result = preg_replace("|$attribute=|i", '', $matches[1]);
                return "<" . $result . ">";
            }, $text);
        }

        return $text;
    }
}

