<?php

namespace Core;

use Core\Container;

class App
{

  protected static Container $container;

  public static function setContainer($container)
  {
    static::$container = $container;
  } // end of setContainer

  public static function container()
  {
    return static::$container;
  } // end of container

  public static function bind($key, $resolver)
  {
    static::container()->bind($key, $resolver);
  } // end of bind

  public static function resolve($key)
  {
    return static::container()->resolve($key);
  } // end of resolve
}
