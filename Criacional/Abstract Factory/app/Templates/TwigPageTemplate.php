<?php

namespace Templates;

use Templates\BasePageTemplate;

class TwigPageTemplate extends BasePageTemplate
{
    public function getTemplateString(): string
    {
        $renderedTitle = $this->titleTemplate->getTemplateString();
        
        return '
            <div class="page">
                '.$renderedTitle.'
                <article class="content">{{ content }}</article>
            </div>
        ';
    }
}


