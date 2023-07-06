<?php

use Contracts\Downloader;

/**
 * Esta é a classe Proxy
 */
class CachingDownloader implements Downloader
{
    /**
     * @var SimpleDownloader
     */
    private $downloader;

    /**
     * @var string[]
     */
    private $cache = [];

    public function __construct(SimpleDownloader $downloader)
    {
        // Agregação
        $this->downloader = $downloader;
    }
    
    public function download(string $url): string
    {
        if (!isset($this->cache[$url])) {
            echo "O arquivo ainda não está no cache. \n";
            $result = $this->downloader->download($url);
            $this->cache[$url] = $result;
        } else {
            echo "O arquivo está em cache.\n";
            echo "Tamanho do arquivo em cache: " . strlen($this->cache[$url]) . "\n";
        }

        return $this->cache[$url];
    }
}


