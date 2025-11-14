---
title: How to use package
description: How to use package
github: https://github.com/zaimealabs/commonmark-bladerender/edit/main/docs/
---

# CommonMark Blade Render Usage

[[TOC]]

## Usage

Register the extension:

```php
use League\CommonMark\Environment\Environment;
use League\CommonMark\CommonMarkConverter;
use Zaimea\CommonMark\BladeRender\BladeRenderExtension;

$environment = new Environment([]);
$environment->addExtension(new BladeRenderExtension());

$converter = new CommonMarkConverter([], $environment);
echo $converter->convert($markdown);

```

## Syntax

 - TODO
------------------------------------------------------------------------

## Support

For issues or suggestions: [GitHub Issues](https://github.com/zaimealabs/commonmark-steps/issues)
