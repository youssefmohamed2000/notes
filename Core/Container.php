<?php

namespace Core;

use Exception;

class Container
{

  protected array $bindings;

  public function bind($key, $resolver)
  {
    $this->bindings[$key] = $resolver;
  } // end of bind

  public function resolve($key)
  {
    if (!key_exists($key, $this->bindings)) {
      throw new Exception('No matching binding found for ' . $key);
    }

    $resolver = $this->bindings[$key];

    return call_user_func($resolver);
  } // end of resolve
}
