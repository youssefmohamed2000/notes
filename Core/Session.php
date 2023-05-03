<?php

namespace Core;

class Session
{

  public static function has($key)
  {
    return (bool) static::get($key);
  } // end of has

  public static function put($key, $value)
  {
    $_SESSION[$key] = $value;
  } // end of put


  public static function get($key)
  {
    return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? null;
  } // end of get

  public static function flash($key, $value)
  {
    $_SESSION['_flash'][$key] = $value;
  } // end of flash

  public static function unflash()
  {
    unset($_SESSION['_flash']);
  } // end of unflash

  public static function flush()
  {
    $_SESSION = [];
  } // end of flush

  public static function destroy()
  {
    static::flush();

    session_destroy();

    $params = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
  } // end of destroy


}
