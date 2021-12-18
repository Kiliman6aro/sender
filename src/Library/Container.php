<?php

namespace App\Library;

use Closure;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class Container implements \Illuminate\Contracts\Container\Container
{

    /**
     * @inheritDoc
     */
    public function bound($abstract)
    {
        // TODO: Implement bound() method.
    }

    /**
     * @inheritDoc
     */
    public function alias($abstract, $alias)
    {
        // TODO: Implement alias() method.
    }

    /**
     * @inheritDoc
     */
    public function tag($abstracts, $tags)
    {
        // TODO: Implement tag() method.
    }

    /**
     * @inheritDoc
     */
    public function tagged($tag)
    {
        // TODO: Implement tagged() method.
    }

    /**
     * @inheritDoc
     */
    public function bind($abstract, $concrete = null, $shared = false)
    {
        // TODO: Implement bind() method.
    }

    /**
     * @inheritDoc
     */
    public function bindIf($abstract, $concrete = null, $shared = false)
    {
        // TODO: Implement bindIf() method.
    }

    /**
     * @inheritDoc
     */
    public function singleton($abstract, $concrete = null)
    {
        // TODO: Implement singleton() method.
    }

    /**
     * @inheritDoc
     */
    public function singletonIf($abstract, $concrete = null)
    {
        // TODO: Implement singletonIf() method.
    }

    /**
     * @inheritDoc
     */
    public function extend($abstract, Closure $closure)
    {
        // TODO: Implement extend() method.
    }

    /**
     * @inheritDoc
     */
    public function instance($abstract, $instance)
    {
        // TODO: Implement instance() method.
    }

    /**
     * @inheritDoc
     */
    public function addContextualBinding($concrete, $abstract, $implementation)
    {
        // TODO: Implement addContextualBinding() method.
    }

    /**
     * @inheritDoc
     */
    public function when($concrete)
    {
        // TODO: Implement when() method.
    }

    /**
     * @inheritDoc
     */
    public function factory($abstract)
    {
        // TODO: Implement factory() method.
    }

    /**
     * @inheritDoc
     */
    public function flush()
    {
        // TODO: Implement flush() method.
    }

    /**
     * @inheritDoc
     */
    public function make($abstract, array $parameters = [])
    {
        // TODO: Implement make() method.
    }

    /**
     * @inheritDoc
     */
    public function call($callback, array $parameters = [], $defaultMethod = null)
    {
        // TODO: Implement call() method.
    }

    /**
     * @inheritDoc
     */
    public function resolved($abstract)
    {
        // TODO: Implement resolved() method.
    }

    /**
     * @inheritDoc
     */
    public function resolving($abstract, Closure $callback = null)
    {
        // TODO: Implement resolving() method.
    }

    /**
     * @inheritDoc
     */
    public function afterResolving($abstract, Closure $callback = null)
    {
        // TODO: Implement afterResolving() method.
    }

    /**
     * @inheritDoc
     */
    public function get(string $id)
    {
        // TODO: Implement get() method.
    }

    /**
     * @inheritDoc
     */
    public function has(string $id)
    {
        // TODO: Implement has() method.
    }
}