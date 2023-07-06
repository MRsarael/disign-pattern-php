<?php

namespace Contracts;

/**
 * A implementação declara um conjunto de métodos "reais", "sob o capô" e "plataformas".
 *
 * Neste caso, a Implementação lista os métodos de renderização que podem ser usados para
 * componha qualquer página da web. Diferentes abstrações podem usar diferentes métodos do
 * Implementação.
 */
interface Renderer
{
    public function renderTitle(string $title): string;
    public function renderTextBlock(string $text): string;
    public function renderImage(string $url): string;
    public function renderLink(string $url, string $title): string;
    public function renderHeader(): string;
    public function renderFooter(): string;
    public function renderParts(array $parts): string;
}


