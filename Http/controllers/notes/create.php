<?php

use Core\Session;

view('notes/create.view.php', [
  'errors' => Session::get('errors')
]);
