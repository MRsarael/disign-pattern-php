<?php

namespace App\ConcreteCommand;

use App\Contracts\WebScrapingCommand;
use App\Queue;

/**
 * ConcreteCommand para scraping de filmes de um gênero específico.
 */
class IMDBGenrePageScrapingCommand extends WebScrapingCommand
{
    private $page;

    public function __construct(string $url, int $page = 1)
    {
        parent::__construct($url);
        $this->page = $page;
    }

    public function getURL(): string
    {
        return $this->url . '?page=' . $this->page;
    }

    /**
     * Extraia todos os filmes de uma página como esta:
     * https://www.imdb.com/search/title?genres=sci-fi&explore=title_type,genres
     */
    public function parse(string $html): void
    {
        preg_match_all("|href=\"(/title/.*?/)\?ref_=adv_li_tt\"|", $html, $matches);
        echo "IMDBGenrePageScrapingCommand: Resultado " . count($matches[1]) . " Filme.\n";

        foreach ($matches[1] as $moviePath) {
            $url = "https://www.imdb.com" . $moviePath;
            Queue::create()->add(new IMDBMovieScrapingCommand($url));
        }

        // Parse the next page URL.
        if (preg_match("|Next &#187;</a>|", $html)) {
            Queue::create()->add(new IMDBGenrePageScrapingCommand($this->url, $this->page + 1));
        }
    }
}


