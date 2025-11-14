<?php

namespace Zaimea\CommonMark\BladeRender;

use Illuminate\Support\Facades\Blade;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use Zaimea\CommonMark\BladeRender\BladeRender;

final class BladeRenderRenderer implements NodeRendererInterface
{
    /**
     * @param  BladeRender  $node
     */
    public function render(Node $node, ChildNodeRendererInterface $childRenderer): string
    {
        BladeRender::assertInstanceOf($node);

        return Blade::render($node->getContent());
    }
}
