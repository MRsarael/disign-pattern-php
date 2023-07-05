<?php

namespace Templates;

use Templates\TitleTemplate;
use Templates\PageTemplate;
use Render\TemplateRenderer;

// Template da classe contrutura
interface TemplateFactory
{
    // Factory methods:
    public function createTitleTemplate(): TitleTemplate;
    public function createPageTemplate(): PageTemplate;
    public function getRenderer(): TemplateRenderer;
}

