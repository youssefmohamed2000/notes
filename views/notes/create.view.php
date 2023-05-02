<!-- Add Notes Modal -->
<div class="modal fade" id="createNote" tabindex="-1" aria-labelledby="createNoteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createNoteLabel">Create</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/notes" method="post">
          <div class="form-group">
            <label for="body">Body</label>
            <input type="text" name="body" class="form-control" id="body" placeholder="Enter Your Note">
            <?php 
            if (isset($_SESSION['errors'])) {
              echo '<small id="emailHelp" class="form-text text-danger"></small>';
            }
            ?>
          </div>
          <input type="hidden" name="_method" value="post">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

