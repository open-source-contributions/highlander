<?php

namespace Highlander;

/**
 * late :: (a -> c, ...b) -> c
 */
function late(callable $fn, ...$args)
{
    return function () use ($fn, $args)
    {
        return $fn(...$args);
    };
}

/**
 * possibly :: (a -> Bool), (a -> b), (a -> b) -> a -> b
 */
function possibly(callable $p, callable $a, callable $b)
{
    return function ($x) use ($p, $a, $b) {
        return $p($x) ? $a($x) : $b($x);
    };
}
