<?php

use Contracts\InputFormat;

require_once 'autoload.php';

/**
 * The client code might be a part of a real website, which renders user-
 * generated content. Since it works with formatters through the Component
 * interface, it doesn't care whether it gets a simple component object or a
 * decorated one.
 */
function displayCommentAsAWebsite(InputFormat $format, string $text)
{
    echo $format->formatText($text);
}

$dangerousComment = "
    Evidentemente, a complexidade dos estudos efetuados auxilia a preparação e a
    composição das diversas correntes de pensamento.
";

/**
 * Instância da classe concreta/nativa
 */
$naiveInput = new TextInput();
echo "Instância da classe concreta/nativa:\n";
displayCommentAsAWebsite($naiveInput, $dangerousComment);
echo "\n\n\n";

/**
 * Instância objeto decorado
 */
$filteredInput = new PlainTextFilter($naiveInput);
echo "Instância objeto decorado (PlainTextFilter):\n";
displayCommentAsAWebsite($filteredInput, $dangerousComment);
echo "\n\n\n";


$dangerousForumPost = "
    Todas estas questões, devidamente ponderadas, levantam dúvidas sobre se o surgimento do comércio virtual garante
    a contribuição de um grupo importante na determinação dos conhecimentos estratégicos para atingir a excelência.
";

/**
 * Instância da classe concreta/nativa
 */
$naiveInput = new TextInput();
displayCommentAsAWebsite($naiveInput, $dangerousForumPost);
echo "\n\n\n";

/**
 * Cada objeto decorado pode usar o outro como base.
 * Cada decorador irá retornar a mensagem à sua maneira.
 */
$text = new TextInput();
$markdown = new MarkdownFormat($text);

// OBS: $markdown é umm objeto decorado
$filteredInput = new DangerousHTMLTagsFilter($markdown);

displayCommentAsAWebsite($filteredInput, $dangerousForumPost);
echo "\n\n\n";

