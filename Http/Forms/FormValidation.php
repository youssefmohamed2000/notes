<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class FormValidation
{
  protected array $errors = [];

  public function __construct(public array $attributes)
  {

    foreach ($attributes as $key => $value) {

      if ($key === 'email') {
        if (!Validator::email($value)) {
          $this->errors['email'] = 'email is invalid';
        }
      } elseif ($key === 'password') {

        if (!Validator::string($value, 6, 255)) {
          $this->errors['password'] = 'password is invalid';
        }
      } elseif ($key === 'password_confirmation') {

        if ($attributes['password'] !== $value) {
          $this->errors['password_confirmation'] = 'confirm password is not identical to password';
        }
      } elseif (is_string($value)) {
        if (!Validator::string($value, 3, 255)) {
          $this->errors[$key] = "{$key} is invalid";
        }
      } // end of if

    } // end of foreach

  } // end of __construct

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
