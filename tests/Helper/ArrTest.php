<?php

namespace Roromedia\Parsedown\Tests\Helper;

use Roromedia\Parsedown\Helper\Arr;
use PHPUnit\Framework\TestCase;

class ArrTest extends TestCase
{
    public function test_first_value()
    {
        $this->assertSame('correct_value', Arr::firstValue([
            1 => 'correct_value',
            0 => 'wrong_value',
            5 => 'absolutely_wrong_value',
        ]));
    }
}
