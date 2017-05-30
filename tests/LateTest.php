<?php

namespace Highlander;

use PHPUnit\Framework\TestCase;

class LateTest extends TestCase
{
    public function testLate()
    {
        $c = late('array_merge', [1], [2]);

        $this->assertSame([1, 2], $c());
    }
}
