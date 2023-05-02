<?php

namespace Core;

class Validator
{

  public static function string($value, $min = 2, $max = INF)
  {
    $value = trim($value);

    return strlen($value) >= $min && strlen($value) < $max;
  } // end of string

  public static function email($value)
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  } // end of email

} // end of class