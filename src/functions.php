<?php

namespace Highlander;

/**
 * consistent :: a -> a
 */
function consistent($x)
{
    return static function () use ($x) {
        return $x;
    };
}

/**
 * compose :: (b -> c), (a -> b) -> a -> c
 */
function compose(callable $f, callable $g)
{
    return function ($x) use ($f, $g) {
        return $f($g($x));
    };
}

/**
 * curry :: a -> b -> c
 */
function curry(callable $f, ...$x) {
    return static function (...$y) use ($f, $x) {
        return $f(...array_merge($x, $y));
    };
}

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
 * part :: a -> b -> a
 */
function part()
{
    static $p;
    return $p ? $p : $p = static function () {
    };
}

/**
 * partial :: ?
 */
function partial(callable $f, ...$x)
{
    return function (...$y) use ($f, $x) {
        $p = part();
        $x = array_map(static function ($a) use (&$y, $p) {
            return $a === $p ? array_shift($y) : $a;
        }, $x);
        return $f(...$x);
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

/**
 * call :: (a -> c, ...b) -> a -> c
 */
function call($a, ...$args)
{
    return function ($x) use ($a, $args) {
        return call_user_func(late([$x, $a], ...$args));
    };
}

/**
 * sequence :: (...a -> b) -> a -> b
 */
function sequence(...$args)
{
    return function ($x = null) use ($args) {
        return \array_reduce($args, static function ($c, $f) {
            return $f($c);
        }, $x);
    };
}

/**
 * store :: (a -> b) -> c -> b
 */
function store()
{
    $y = null;
    return static function ($x = null) use (&$y) {
        return isset($y) ? $y : $y = $x;
    };
}
