<?php

namespace Business\Audio;

use Business\Video\FFMpegVideo;

/**
 * FFmpeg subsystem (biblioteca de vídeo e audio)
 */
class FFMpeg
{
    public static function create(): FFMpeg
    {
        return new FFMpeg();
    }

    public function open(string $video): FFMpegVideo
    {
        echo "Processando conteúdo do vídeo $video...\n";
        sleep(2);
        return new FFMpegVideo($video);
    }
}

