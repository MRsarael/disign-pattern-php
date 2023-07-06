<?php

namespace Business\Video;

/**
 * YouTube API subsystem.
 */
class YouTube
{
    private $title;
    private $name;
    private $path;

    public function fetchVideo(string $url): self
    {
        echo "Buscando metadados de vídeo do youtube...\n";
        sleep(2);
        $this->title = "Título vídeo de teste";
        return $this;
    }

    public function saveAs(string $path, string $newName): void
    {
        echo "Salvando arquivo de vídeo temporário...\n";
        $this->name = $newName;
        $this->path = "$path/$newName";
        sleep(2);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPath()
    {
        return $this->path;
    }
}


