<?php

namespace App\Contracts;

use App\Contracts\Command;
use App\Queue;

/**
 * Estrutura básica de download comum a todos os ConcreteCommand's.
 */
abstract class WebScrapingCommand implements Command
{
    public $id;

    public $status = 0;

    /**
     * @var string URL para scraping.
     */
    public $url;

    public function __construct(string $url)
    {
        $this->url = $url;
    }

    abstract public function parse(string $html): void;

    public function getId(): int
    {
        return $this->id;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function getURL(): string
    {
        return $this->url;
    }

    /**
     * Método padrão de scraping
     */
    public function execute(): void
    {
        $html = $this->download();
        $this->parse($html);
        $this->complete();
    }

    public function download(): string
    {
        $html = file_get_contents($this->getURL());
        echo "WebScrapingCommand: baixado {$this->url}\n";
        return $html;
    }

    public function complete(): void
    {
        $this->status = 1;
        Queue::create()->completeCommand($this);
    }
}


