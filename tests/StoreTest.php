<?php

namespace Highlander;

use PHPUnit\Framework\TestCase;

class StoreTest extends TestCase
{
    public function testStore()
    {
        $s = store();

        $this->assertSame(true, $s(true));
        $this->assertSame(true, $s());
        $this->assertSame(true, $s(false));

        $s = store();

        $this->assertSame(false, $s(false));
        $this->assertSame(false, $s());
        $this->assertSame(false, $s(true));
    }
}
