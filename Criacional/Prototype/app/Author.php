<?php

// use Page;

class Author
{
    private $name;
    private $pages = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addToPage(Page $page): void
    {
        $this->pages[] = $page;
    }

    public function teste()
    {
        return 'asd adsdasd';
    }
}
