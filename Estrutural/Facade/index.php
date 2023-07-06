<?php

require_once 'autoload.php';

function clientCode(YouTubeDownloader $facade)
{
    $facade->downloadVideo("https://www.youtube.com/watch?v=oE_1fEE2PIU");
}

$facade = new YouTubeDownloader("APIKEY-XXXXXXXXX");
clientCode($facade);

