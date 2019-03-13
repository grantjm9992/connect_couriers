@inject('translator', 'App\Providers\TranslationProvider')
<div class="modal fade" id="msgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="Messages.askQuestion">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send message to {{ $listing->str_user }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <input type="text" hidden name="id_receiver" value="{{ $listing->id_user }}">
      <input type="text" hidden name="id_listing" value="{{ $listing->id_listing }}">
      <input type="text" hidden name="url" value="{{ $url }}">
        <textarea name="str_message" id="str_message" cols="30" rows="4" class="form-control"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
    $(document).ready( function() {
        $('#msgModal').modal('show');
    });
</script>