@inject('translator', 'App\Providers\TranslationProvider')
<div class="modal fade" id="quoteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="Quote.add">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add quote</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" hidden name="id_listing" value="{{ $id_listing }}">
        <input type="text" hidden name="url" value="{{ $url }}">
        <div class="form-group">
            <label for="num_amount">Quote amount</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">€</span>
                </div>
                <input type="number" step="1" min="10" name="amount_start" class="form-control" placeholder="Quote amount" aria-label="Quote amount" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2">€</span>
                </div>
                <input type="number" step="1" min="10" name="amount_min" class="form-control" placeholder="Minimum quote" aria-label="Minimum quote" aria-describedby="basic-addon2">
            </div>
        </div>
        <div class="form-group">
            <label for="id_vehicle">Vehicle</label>
            <select name="id_vehicle" id="id_vehicle" class="form-control">
                @foreach ( $vehicles as $vehicle )
                    <option value="{{ $vehicle->id_vehicle }}">{{ $vehicle->str_vehicle }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_time_scale">Time scale</label>
            <select name="id_time_scale" id="id_time_scale" class="form-control">
                @foreach ( $timescales as $ts )
                    <option value="{{ $ts->id_time_scale }}">{{ $ts->str_time_scale }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="str_description">Description</label>
            <textarea name="str_description" id="" cols="30" rows="5" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button hidden type="submit" id="submit"></button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <div class="btn btn-primary" onclick="submitQuote()">Send</div>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
    $(document).ready( function() {
        $('#quoteModal').modal('show');
    });

    function submitQuote()
    {
        var min = parseInt( $("[name='amount_min']").val() );
        var start = parseInt( $('[name="amount_start"]').val() );

        if ( min > start )
        {
            alert( "Min has to be less than or equal to the start value ");
        }
        else
        {
            $('#submit').click();
        }
    }
</script>