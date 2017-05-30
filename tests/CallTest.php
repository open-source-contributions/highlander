<?php

namespace Highlander;

use PHPUnit\Framework\TestCase;

class CallTest extends TestCase
{
    public function testCall()
    {
        $hello = call('say', 'world');

        $this->assertSame('Hello, world!', $hello($this));
    }

    public function say($name)
    {
        return "Hello, $name!";
    }
}
