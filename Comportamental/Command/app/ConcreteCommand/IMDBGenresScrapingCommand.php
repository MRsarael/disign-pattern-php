<?php

namespace App\ConcreteCommand;

use App\Contracts\WebScrapingCommand;
use App\Queue;

/**
 * ConcreteCommand para scraping dos gêneros de filmes.
 */
class IMDBGenresScrapingCommand extends WebScrapingCommand
{
    public function __construct()
    {
        $this->url = "https://www.imdb.com/feature/genre/";
    }

    /**
     * Extraia todos os gêneros e seus URLs de pesquisa da página:
     * https://www.imdb.com/feature/genre/
     */
    public function parse($html): void
    {
        preg_match_all("|href=\"(https://www.imdb.com/search/title\?genres=.*?)\"|", $html, $matches);
        echo "IMDBGenresScrapingCommand: Resultado " . count($matches[1]) . " Gênero.\n";

        foreach ($matches[1] as $genre) {
            Queue::create()->add(new IMDBGenrePageScrapingCommand($genre));
        }
    }
}



