<?php

namespace Factories;

use Templates\TemplateFactory;
use Templates\TitleTemplate;
use Templates\PHPTemplateTitleTemplate;
use Templates\PageTemplate;
use Templates\PHPTemplatePageTemplate;
use Render\TemplateRenderer;
use Render\PHPTemplateRenderer;

class PHPTemplateFactory implements TemplateFactory
{
    public function createTitleTemplate(): TitleTemplate
    {
        return new PHPTemplateTitleTemplate();
    }

    public function createPageTemplate(): PageTemplate
    {
        return new PHPTemplatePageTemplate($this->createTitleTemplate());
    }

    public function getRenderer(): TemplateRenderer
    {
        return new PHPTemplateRenderer();
    }
}

