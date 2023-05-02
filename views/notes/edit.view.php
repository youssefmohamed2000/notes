<?php

view('templates/header.php')

?>
<h1 class="text-center  mt-5 mb-2 py-3">Edit Note</h1>

<div class="container">

    <div class="row">

        <div class="col-8 mx-auto">

            <form class="p-5 border rounded mb-5" method="POST" action="/notes">

                <?php
                if (!empty($errors)) : ?>
                    <p class="alert alert-danger text-center">
                        <?= $errors['body'] ?>
                    </p>
                <?php
                endif; ?>
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <div class="form-group">

                    <label for="body">Body</label>
                    <input type="text" name="body" class="form-control" id="body" value="<?= $note['body'] ?>">
                    <br>

                </div>

                <div class="form-group d-flex justify-content-end gap-2">
                    <a href="/notes" class="btn btn-secondary">Cancel</a>
                    <button type="submit" name="submit" class=" btn btn-primary">
                        Update
                    </button>

                </div>
            </form>

        </div>
    </div>
</div>

<?php

view('templates/footer.php')

?>