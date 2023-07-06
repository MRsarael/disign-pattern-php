<?php

use Business\Video\YouTube;
use Business\Audio\FFMpeg;

/**
 * Facade, fornece uma interface de uso das classes e YouTube e FFMpeg
 * O cliente não irá conhecer YouTube e FFMpeg
 */
class YouTubeDownloader
{
    protected $youtube;
    protected $ffmpeg;
    protected $ffmpegVideo;

    /**
     * Realizando agregação dos objetos
     */
    public function __construct(string $youtubeApiKey)
    {
        // Este é o subsistema de classes/interfaces que YouTubeDownloader simplifica
        $this->youtube = new YouTube($youtubeApiKey);
        $this->ffmpeg = new FFMpeg();
    }

    public function downloadVideo(string $url): void
    {
        $title = $this->youtube->fetchVideo($url)->getTitle();
        echo "Título do vídeo: $title \n";

        $this->youtube->saveAs($url, "video.mpg");
        echo "Local do arquivo: ".$this->youtube->getPath()." \n";
        
        $video = FFMpeg::create()->open('video.mpg');
        $video->filters()->resize(320, 240)->synchronize();

        $video->frame(10)->save($title . 'frame.jpg');
    }
}

