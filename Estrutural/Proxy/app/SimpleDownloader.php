<?php

use Contracts\Downloader;

/**
 * Esta é a classe concreta
 */
class SimpleDownloader implements Downloader
{
    public function download(string $url): string
    {
        echo "Realizando download de arquivo.\n";
        $result = file_get_contents($url);
        echo "Tamanho em bytes do arquivo: " . strlen($result) . "\n";
        return $result;
    }
}


