<?php

namespace Zaimea\CommonMark\BladeRender;

use League\CommonMark\Node\Block\AbstractBlock;

class BladeRender extends AbstractBlock
{
     public function __construct(
        private string $content = ''
    ) {}

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }
}
