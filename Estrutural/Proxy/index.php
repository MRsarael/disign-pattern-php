<?php

use Contracts\Downloader;

require_once 'autoload.php';

function clientCode(Downloader $subject)
{
    $subject->download("app/Files/FileDownload.txt");
    $subject->download("app/Files/FileDownload.txt");
}

echo "Executando código cliente com o objeto concreto:\n";
$realSubject = new SimpleDownloader();
clientCode($realSubject);

echo "\n";

echo "Executando código cliente com o objeto proxy:\n";
$proxy = new CachingDownloader($realSubject);
clientCode($proxy);



