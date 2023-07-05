<?php

// use Author;
// use Page;

require_once 'autoload.php';

$author = new Author("John Smith");
$page = new Page("Tip of the day", "Keep calm and carry on.", $author);

$page->addComment("Nice tip, thanks!");

// Rascunho foi criado tendo como protótipo a página principal
$draft = clone $page;
echo "Dump of the clone. Note that the author is now referencing two objects.\n\n";


print_r($draft);

