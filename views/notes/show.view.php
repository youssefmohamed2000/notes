<?php

view('templates/header.php')

?>

<h1 class="text-center mt-2">My Notes</h1>
<div class="container">
  <!-- <div class="row">
    <div class="col-10 mx-auto p-4 border mb-5">
      <?php
      if (isset($success)) : ?>
        <h3 class="alert alert-success text-center">
          <?= $success;
          ?>
        </h3>
      <?php
      endif;
      ?>
      <?php
      if (isset($error)) :
      ?>
        <h3 class="alert alert-danger text-center">
          <?= $error; ?>
        </h3>
      <?php
      endif;
      ?>
    </div>
  </div> -->



  <?php
  if (!empty($notes)) {

    foreach ($notes as $note) { ?>
      <div class="row">

        <div class="col-md-6 col-lg-4 mt-5">
          <div class="card">

            <div class="card-body">
              <h5 class="card-title">
                <span class="text-sm">Note By</span> <?= $note['username'] ?>
              </h5>
              <p class="card-text"><?= $note['body'] ?></p>
              <a class="btn btn btn-sm btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#editNote">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg> Edit
              </a>
              <form action="notes" method="POST" class="d-inline">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="btn btn-sm btn-danger">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                  </svg>
                  Delete
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php }
  } else { ?>
    <div class="row justify-content-center">

      <div class="col-md-8">
        <div class="card mt-5 mx-5 text-secondary-emphasis shadow text-center">
          <div class="card-body">
            <p>
              You don't have any notes you can add from <a href="/notes/create">here</a>
            </p>
          </div>
        </div>

      </div>
    </div>
  <?php } ?>
</div>
<!-- </div> -->

<?php

view('templates/footer.php')

?>