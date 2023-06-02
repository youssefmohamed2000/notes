<?php

view('templates/header.php');

?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card mt-5 mx-5 text-secondary-emphasis shadow">
        <div class="card-header pt-3">
          <p class="fw-bold fs-5 text-center">
            Register here!!
          </p>
        </div>
        <div class="card-body">
          <form action="/register" method="POST">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="<?= old('name') ?>">
              <?php if (isset($errors['name'])) { ?>
                <span class="text-danger"><?= $errors['name'] ?></span>
              <?php } ?>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" value="<?= old('email') ?>">
              <?php if (isset($errors['email'])) { ?>
                <span class="text-danger"><?= $errors['email'] ?></span>
              <?php } ?>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
              <?php if (isset($errors['password'])) { ?>
                <span class="text-danger"><?= $errors['password'] ?></span>
              <?php } ?>
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
              <?php if (isset($errors['password_confirmation'])) { ?>
                <span class="text-danger"><?= $errors['password_confirmation'] ?></span>
              <?php } ?>
            </div>
            <div class="d-flex justify-content-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>

<?php

view('templates/footer.php');

?>