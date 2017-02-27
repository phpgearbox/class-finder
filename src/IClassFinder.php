<?php declare(strict_types=1);
////////////////////////////////////////////////////////////////////////////////
// __________ __             ________                   __________
// \______   \  |__ ______  /  _____/  ____ _____ ______\______   \ _______  ___
//  |     ___/  |  \\____ \/   \  ____/ __ \\__  \\_  __ \    |  _//  _ \  \/  /
//  |    |   |   Y  \  |_> >    \_\  \  ___/ / __ \|  | \/    |   (  <_> >    <
//  |____|   |___|  /   __/ \______  /\___  >____  /__|  |______  /\____/__/\_ \
//                \/|__|           \/     \/     \/             \/            \/
// -----------------------------------------------------------------------------
//          Designed and Developed by Brad Jones <brad @="bjc.id.au" />
// -----------------------------------------------------------------------------
////////////////////////////////////////////////////////////////////////////////

namespace Gears;

use Closure;
use Countable;
use IteratorAggregate;

interface IClassFinder extends IteratorAggregate, Countable
{
    /**
     * Namespace setter.
     * 
     * @param  string       $namespace The namespace to find classes inside of.
     * @return IClassFinder            You may method chain.
     */
    public function namespace(string $namespace): IClassFinder;
    
    /**
     * Interface setter.
     *
     * @param  string       $interface The interface name to filter classes by.
     * @return IClassFinder            You may method chain.
     */
    public function implements(string $interface): IClassFinder;
    
    /**
     * Parent setter.
     * 
     * @param  string       $parent A parent class to filter by.
     * @return IClassFinder         You may method chain.
     */
    public function extends(string $parent): IClassFinder;
    
    /**
     * Custom filter method setter.
     * 
     * @param  Closure      $filter A custom filter method to use instead
     *                              of our `defaultFilter`.
     * @return IClassFinder         You may method chain.
     */
    public function filterBy(Closure $filter): IClassFinder;
    
    /**
     * Once you have set the search parameters, call this to actually search.
     * 
     * @return array An array of found class names.
     */
    public function search(): array;
}