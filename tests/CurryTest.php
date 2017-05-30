<?php

namespace Highlander;

use PHPUnit\Framework\TestCase;

class CurryTest extends TestCase
{
    public function testCurry()
    {
        $f = curry('array_merge', [1], [2]);

        $this->assertSame([1, 2, 3], $f([3]));

        $f = curry('implode', ',');

        $this->assertSame('1,2,3', $f([1, 2, 3]));
    }
}
