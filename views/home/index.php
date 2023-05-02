<?php

view('templates/header.php');

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-5 mx-5 text-secondary-emphasis shadow text-center">
                <div class="card-header pt-3">
                    <p class="fw-bold fs-5">
                        Hello , <?= $_SESSION['user']['name'] ?>
                    </p>
                </div>
                <div class="card-body">
                    <h4 class="fw-bold">This is a Notes Project</h4>
                    <p>
                        this is a native php project where i applied mvc
                        design for practicing
                        pattern <br>
                        where you can create , read , update and delete
                        notes
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>


<?php

view('templates/footer.php')

?>