<?php

namespace Zaimea\CommonMark\BladeRender;

use League\CommonMark\Parser\Block\BlockStart;
use League\CommonMark\Parser\Block\BlockStartParserInterface;
use League\CommonMark\Parser\Cursor;
use League\CommonMark\Parser\MarkdownParserStateInterface;

class BladeRenderStartParser implements BlockStartParserInterface
{
    public function tryStart(Cursor $cursor, MarkdownParserStateInterface $parserState): ?BlockStart
    {
        if ($cursor->isIndented()) {
            return BlockStart::none();
        }

        // Allow forms: "::: blade", ":::blade", "::: blade<BR/>".
        $fence = $cursor->match('/^:::\s*blade(?:\s*<br\s*\/?>)?/i');
        if ($fence === null) {
            return BlockStart::none();
        }

        return BlockStart::of(new BladeRenderParser())->at($cursor);
    }
}
