<?php

namespace Core;

use Core\App;

class Authenticator
{
  public function attempt($email, $password)
  {
    $db = App::resolve(Database::class);

    $user = $db->query('SELECT * FROM users WHERE email = :email', [
      'email' => $email,
    ])->find();

    if ($user) {
      // check password 

      if (password_verify($password, $user['password'])) {
        $this->login([
          'id' => $user['id'],
          'name' => $user['name'],
          'email' => $user['email']
        ]);

        return true;
      }
    }

    return false;
  } // end of attempt

  public function login($user)
  {
    $_SESSION['user'] = [
      'id' => $user['id'],
      'name' => $user['name'],
      'email' => $user['email'],
    ];

    session_regenerate_id(true);
  } // end of login

  public function logout()
  {
    Session::destroy();
  } // end of logout
}
