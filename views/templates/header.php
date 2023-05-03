<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href=<?= assets('css/bootstrap.min.css') ?>>
</head>

<body>

  <nav class="navbar navbar-expand-lg sticky-top bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="/">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php if (auth()) { ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/notes">Notes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/notes/create">Add Notes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/my-notes">My Notes</a>
            </li>
          </ul>
        <?php } ?>
        <?php if (!auth()) { ?>

          <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>
          </ul>

        <?php } else { ?>

          <div class="dropdown">
            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['user']['name'] ?>
            </button>
            <ul class="dropdown-menu">
              <li>
                <form action="/logout" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  <button type="submit" class="dropdown-item">logout</button>
                </form>
              </li>
            </ul>
          </div>

        <?php } ?>
      </div>
    </div>
  </nav>