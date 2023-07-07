<?php

namespace App\ConcreteCommand;

use App\Contracts\WebScrapingCommand;

/**
 * ConcreteCommand para scraping dos detalhes do filme.
 */
class IMDBMovieScrapingCommand extends WebScrapingCommand
{
    /**
     * Recupera informações do filme contidas na página:
     * https://www.imdb.com/title/tt4154756/
     */
    public function parse(string $html): void
    {
        if (preg_match("|<h1 itemprop=\"name\" class=\"\">(.*?)</h1>|", $html, $matches)) {
            $title = $matches[1];
        }

        echo "IMDBMovieScrapingCommand: Parsed movie $title.\n";
    }
}


