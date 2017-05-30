<?php

namespace Highlander;

use PHPUnit\Framework\TestCase;

class SequenceTest extends TestCase
{
    public function testSequence()
    {
        $a = sequence(
            late([$this, 'returnThis']),
            call('hello')
        );

        $this->assertSame('hello!', $a());

        $b = sequence(
            'strtolower',
            'ucwords'
        );

        $this->assertSame('Hi Phil', $b('HI PHIL'));
    }

    public function returnThis()
    {
        return $this;
    }

    public function hello()
    {
        return 'hello!';
    }
}
