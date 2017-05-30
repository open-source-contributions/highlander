<?php

namespace Highlander;

use PHPUnit\Framework\TestCase;

class PartialTest extends TestCase
{
    public function testPartial()
    {
        $a = partial('array_merge', [1], part(), part(), [4]);

        $this->assertSame([1, 2, 3, 4], $a([2], [3]));
    }
}
