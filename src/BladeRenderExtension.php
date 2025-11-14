<?php

namespace Zaimea\CommonMark\BladeRender;

use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\ExtensionInterface;
use Zaimea\CommonMark\BladeRender\BladeRenderRenderer;
use Zaimea\CommonMark\BladeRender\BladeRenderStartParser;
use Zaimea\CommonMark\BladeRender\BladeRender;

class BladeRenderExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        // Add parser that recognizes the opening fence
        $environment->addBlockStartParser(new BladeRenderStartParser());

        // Add renderer for BladeRender nodes
        $environment->addRenderer(BladeRender::class, new BladeRenderRenderer());
    }
}
