<?php

$header = <<<EOF
This file is part of ArrayObjectArray.

(copyleft) R. Eric Wheeler <sikofitt@gmail.com>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

Symfony\CS\Fixer\Contrib\HeaderCommentFixer::setHeader($header);

$finder = Symfony\CS\Finder\DefaultFinder::create()
  ->exclude('vendor')
  ->ignoreDotFiles(true)
  ->ignoreVCS(true)
  ->name('*.php')
  ->in(__DIR__)
  ;

return Symfony\CS\Config\Config::create()
  ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
  ->fixers(
    [
      'symfony',
      'header_comment',
      'ordered_use',
      'php_unit_construct',
      'php_unit_strict',
      'strict',
      'strict_param',
      'symfony',
      'newline_after_open_tag',
      'phpdoc_order',
      'long_array_syntax',
      'short_echo_tag',
      '-multiple_use',
      'spaces'
    ]
  )
  ->finder($finder)
  ;
