<?php

namespace Highlander;

use PHPUnit\Framework\TestCase;

class ComposeTest extends TestCase
{
    public function testCompose()
    {
        $f = 'ucwords';
        $g = 'strtolower';
        $x = 'DR SMITH';

        $a = compose($f, $g);

        $this->assertSame('Dr Smith', $a($x));
    }
}
