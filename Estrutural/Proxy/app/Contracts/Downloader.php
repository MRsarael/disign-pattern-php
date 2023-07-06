<?php

namespace Contracts;

interface Downloader
{
    public function download(string $url): string;
}

