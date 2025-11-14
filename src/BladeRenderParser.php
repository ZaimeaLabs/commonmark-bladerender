<?php

namespace Zaimea\CommonMark\BladeRender;

use League\CommonMark\Parser\Block\AbstractBlockContinueParser;
use League\CommonMark\Parser\Block\BlockContinue;
use League\CommonMark\Parser\Block\BlockContinueParserInterface;
use League\CommonMark\Parser\Cursor;
use League\CommonMark\Util\ArrayCollection;
use Zaimea\CommonMark\BladeRender\BladeRender;

class BladeRenderParser extends AbstractBlockContinueParser
{
    private BladeRender $block;

    private ArrayCollection $strings;

    public function __construct()
    {
        $this->block = new BladeRender;
        $this->strings = new ArrayCollection;
    }

    public function getBlock(): BladeRender
    {
        return $this->block;
    }

    public function addLine(string $line): void
    {
        $this->strings[] = $line;
    }

    public function closeBlock(): void
    {
        $this->block->setContent(
            ltrim(implode("\n", $this->strings->toArray()))
        );
    }

    public function tryContinue(Cursor $cursor, BlockContinueParserInterface $activeBlockParser): ?BlockContinue
    {
        // Allow forms: "::: endblade", ":::endblade", "::: endblade<BR/>".
        if ($cursor->match('/^:::\s*endblade(?:\s*<br\s*\/?>)?/i')) {
            return BlockContinue::finished();
        }

        return BlockContinue::at($cursor);
    }
}
