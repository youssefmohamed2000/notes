<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
  protected array $errors = [];

  public function __construct(public array $attributes)
  {

    if (!Validator::email($attributes['email'])) {
      $this->errors['email'] = 'email is invalid';
    }

    if (!Validator::string($attributes['password'], 6, 255)) {
      $this->errors['password'] = 'password is invalid';
    }
  }
  public static function validate($attributes)
  {
    $instance = new static($attributes);

    $instance->failed() ? $instance->throw() : $instance;

    return $instance;
  } // end of validate

  public function throw()
  {
    ValidationException::throw($this->errors(), $this->attributes);
  } // end of throw

  public function failed()
  {
    return (bool) count($this->errors);
  }

  public function errors()
  {
    return $this->errors;
  } // end of errors

  public function error($field, $message)
  {
    $this->errors[$field] = $message;
    
    return $this;
  } // end of error
}
