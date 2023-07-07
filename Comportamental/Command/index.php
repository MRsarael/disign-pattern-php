<?php

// Neste exemplo usamos o padrão Command para enfileirar chamadas de web scraping
// no site do IMDB e executá-las uma a uma. A fila em si é mantida em um banco de dados
// que ajuda a preservar comandos entre ativações de script.

require_once 'autoload.php';

use App\ConcreteCommand\IMDBGenresScrapingCommand;
use App\ConcreteCommand\IMDBGenrePageScrapingCommand;
use App\ConcreteCommand\IMDBMovieScrapingCommand;
use App\Queue;

$url = "https://www.imdb.com/search/title";

$queue = Queue::create();

// Adicionando comandos
$queue->add(new IMDBGenresScrapingCommand());
$queue->add(new IMDBGenrePageScrapingCommand($url));
$queue->add(new IMDBMovieScrapingCommand($url));

// Executando fila
$queue->work();



