<?php

namespace Roromedia\Parsedown\Helper;

class Arr
{
  public static function getFirstString(array $array): string
  {
    return static::firstValue($array) ?? '';
  }

  public static function firstValue(array $array): mixed
  {
    return array_values($array)[0];
  }
}
