<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{

  protected array $routes;

  public function add($uri, $controller, $method)
  {
    $this->routes[] = /*compact('uri', 'controller', 'method')*/ [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null
    ];
    return $this;
  } // end of add

  public function get($uri, $controller)
  {
    return $this->add($uri, $controller, 'GET');
  } // end of get
  public function post($uri, $controller)
  {
    return $this->add($uri, $controller, 'POST');
  } // end of post
  public function put($uri, $controller)
  {
    return $this->add($uri, $controller, 'PUT');
  } // end of put

  public function patch($uri, $controller)
  {
    return $this->add($uri, $controller, 'PATCH');
  } // end of patch

  public function delete($uri, $controller)
  {
    return $this->add($uri, $controller, 'DELETE');
  } // end of delete


  public function only($key)
  {
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    return $this;
  } // end of only

  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      if (
        $route['uri'] == $uri
        && $route['method'] === strtoupper($method)
      ) {
        Middleware::resolve($route['middleware']);
        return require_once basePath('Http' . DS . 'controllers' . DS . $route['controller']);
      }
    }

    abort(404);
  } // end of route

  public function previousUrl()
  {
    return $_SERVER['HTTP_REFERER'];
  } // end of previousUrl
} // end of class