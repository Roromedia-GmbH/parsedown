<?php

namespace Roromedia\Parsedown\Helper;

class Arr
{
  public static function firstValue(array $array): mixed
  {
    return array_values($array)[0];
  }
}
