<?php

namespace Roromedia\Parsedown;

use Roromedia\Parsedown\Helper\Arr;
use ParsedownExtra;
use Symfony\Component\String\UnicodeString;

class Parsedown extends ParsedownExtra {

  public function text($text): string {
    $text = parent::text($text);
    $lines = $this->explodeInLines($text);

    foreach ($lines as $number => $line) {
      $this->injectIdIntoHeadlineIfValid($line, $text, $lines, $number);
    }

    return $this->implodeLines($lines);
  }

  private function getMenulinks(string $text): array {
    $lines = $this->explodeInLines($text);

    return array_map(
      fn(string $line) => $this->getNameOfHeadline($line),
      array_filter($lines, fn(string $line) => $this->getNameOfHeadline($line))
    );
  }

  private function implodeLines(array $lines): string {
    return implode("\n", $lines);
  }

  private function getNameOfHeadline(string $line): string|null {
    preg_match('/<li><a href="(.+)">/', $line, $matches);
    return $matches[1] ?? NULL;
  }

  private function explodeInLines(string|null $text): array {
    return $text ? explode("\n", $text) : [];
  }

  private function isHeadline(string $line): bool {
    return (new UnicodeString($line))->startsWith('<h');
  }

  private static function normalizeName(string $name): string {
    return substr($name, 1);
  }

  private static function extractHeadlineNameFromLine(string $line): string {
    return strtolower(str_replace('_', '-', ltrim(rtrim(preg_replace('/\W/', '_', substr($line, 4, -5)), '_'), '_')));
  }

  private function headlineContainsOneOf(string $line, array $menulinks): string|bool {
    $result = array_filter($menulinks, fn(string $link) => static::headlineContainsName($line, $link));
    return !empty($result) ? static::normalizeName(Arr::firstValue($result)) : FALSE;
  }

  private static function headlineContainsName(string $line, $name): bool {
    return static::extractHeadlineNameFromLine($line) === static::normalizeName($name);
  }

  private function injectIdIntoHeadline(string $line, bool|string $name, array &$lines, int|string $number): void {
    $lines[$number] = substr_replace($line, sprintf(' id="%s"', $name), 3, 0);
  }

  private function isValidHeadline(mixed $line, string $text): bool {
    return $this->isHeadline($line) && $this->headlineContainsOneOf($line, $this->getMenulinks($text));
  }

  private function getMenulinkName(string $line, string $text): bool|string {
    return $this->headlineContainsOneOf($line, $this->getMenulinks($text));
  }

  private function injectIdIntoHeadlineIfValid(mixed $line, string $text, array &$lines, int|string $number): void {
    $this->isValidHeadline($line, $text) && $this->injectIdIntoHeadline($line, $this->getMenulinkName($line, $text), $lines, $number);
  }

}
