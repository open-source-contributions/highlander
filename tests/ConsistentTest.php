<?php

namespace Highlander;

use PHPUnit\Framework\TestCase;

class ConsistentTest extends TestCase
{
    public function testConsistent()
    {
        $t = consistent(true);
        $f = consistent(false);

        $this->assertTrue($t());
        $this->assertTrue($t(true));
        $this->assertTrue($t(false));

        $this->assertFalse($f());
        $this->assertFalse($f(true));
        $this->assertFalse($f(false));
    }
}
