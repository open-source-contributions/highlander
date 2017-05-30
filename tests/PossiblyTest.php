<?php

namespace Highlander;

use PHPUnit\Framework\TestCase;

class PossiblyTest extends TestCase
{
    public function testPossibly()
    {
        $t = function ($x) {
            return "yes, $x is";
        };

        $f = function ($x) {
            return "no, $x is not";
        };

        $even = function ($x) {
            return $x % 2 === 0;
        };

        $p = possibly($even, $t, $f);

        $this->assertSame("yes, 2 is", $p(2));
        $this->assertSame("no, 3 is not", $p(3));

        $odd = function ($x) {
            return $x % 2 === 1;
        };

        $p = possibly($odd, $t, $f);

        $this->assertSame("no, 2 is not", $p(2));
        $this->assertSame("yes, 3 is", $p(3));
    }
}
