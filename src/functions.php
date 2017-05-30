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
