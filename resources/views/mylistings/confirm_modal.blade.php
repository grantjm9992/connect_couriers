@inject('translator', 'App\Providers\TranslationProvider')
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="MyListings.delete">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Listing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" name="id" value="{{ $id }}" hidden>
        <h4>Are you sure that you want to delete your listing?</h4>
        <h6>We'd hate for you to miss out on all of the wonderful savings that you could be making. However, we always want to improve, so why have you decided to remove your listing?</h6>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="why" id="radio1" value="1">
          <label class="form-check-label" for="radio1">
            I have found a better price elsewhere
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="why" id="radio2" value="2">
          <label class="form-check-label" for="radio2">
            I don't like the idea of your website
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="why" id="radio3" value="3">
          <label class="form-check-label" for="radio3">
            I don't need to move it anymore
          </label>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Delete</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
    $(document).ready( function() {
        $('#confirmModal').modal('show');
    });
</script>