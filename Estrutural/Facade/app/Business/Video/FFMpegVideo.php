<?php

namespace Business\Video;

class FFMpegVideo
{
    private $video;

    public function __construct($video)
    {
        $this->video = $video;
    }

    public function filters(): self
    {
        echo "Filtrando vídeo ".$this->video."...\n";
        sleep(2);
        return $this;
    }

    public function resize(int $tidth, int $heigth): self
    {
        echo "Ajustando dimenções...\n";
        sleep(2);
        return $this;
    }

    public function synchronize(): self
    {
        echo "Sincronnizando...\n";
        sleep(2);
        return $this;
    }

    public function frame(int $timeSeconds): self
    {
        echo "Atualizando fames...\n";
        sleep($timeSeconds);
        return $this;
    }

    public function save(string $path): self
    {
        $this->video = $path;
        echo "Salvando ".$this->video."...\n";
        sleep(3);
        echo "Pronto, vídeo salvo com sucesso!\n";
        return $this;
    }
}

