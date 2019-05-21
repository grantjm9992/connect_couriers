@inject('translator', 'App\Providers\TranslationProvider')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAs6KdmD9OYa2BHZb734w7dmA0QWWa5Dk&libraries=places&region=GB"></script>
<div class="section">
    <form action="Listings.add">
        <div class="row">
            <div class="col-12 col-sm-10 col-md-8" style="margin: 5px auto; padding: 40px; background-color: #f3f1f1;">
                <h4 style="margin-bottom: 25px;"><i class="fas fa-info-circle"></i> Listing Info</h4>
                {!! $email !!}
                <div class="form-group">
                    <select name="id_category" id="id_category" class="form-control">
                        @foreach ( $categories as $category )
                            <option value="{{ $category->id_category }}">{{ $category->str_category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="str_title" placeholder="Title" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="collection_postcode" id="collection_postcode" placeholder="Collection PostCode" required>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="delivery_postcode" id="delivery_postcode" placeholder="Delivery PostCode" required>
                </div>
                <div class="form-group">
                    <div class="" style="text-align: left;">
                        <label class="switch">
                            <input type="checkbox" class="" value="" id="bln_flexible">
                            <span class="slider round formslider"></span>
                        </label>
                        <input type="text" name="bln_flexible" hidden value="0">
                        <label style="margin-left: 40px;" class="form-check-label" for="bln_flexible">
                            I'm flexible
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="delivery">Delivery Timeframe</label>
                    <select name="id_time_scale" id="id_time_scale" class="form-control">
                        <option value="1">Fixed date</option>
                        <option value="2">In the next week</option>
                        <option value="3">In the next 2 weeks</option>
                        <option value="4">In the next month</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="delivery_date" autocomplete="off" id="delivery_date" placeholder="Delivery Date">
                </div>
                <div class="form-group">
                    <button class="btn btn-cc" type="submit">Send</button>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        var tipo = '{{ $tipo }}';
        if ( tipo != "" )
        {
            $('#id_category').val(tipo);
        }
        $('#delivery_date').datepicker();
        $('#delivery').on("change", function() {
            if ( $(this).val() != "1" )
            {
                $( "#delivery_date" ).datepicker( "option", "disabled", true );
            }
            else
            {
                $( "#delivery_date" ).datepicker( "option", "disabled", false );
            }
        });
        $('#bln_flexible').on('change', function() {
            if($(this).is(":checked" ) )     {
                $('[name="bln_flexible"]').val(1);
                $('#delivery_date').val('');
                $( "#delivery_date" ).datepicker( "option", "disabled", true );
                $('#delivery').prop('disabled', true);
            } else {
                $('[name="bln_flexible"]').val(0);
                if ( $("#delivery").val() == "1" ) $( "#delivery_date" ).datepicker( "option", "disabled", false );
                $('#delivery').prop('disabled', false);
            }
        });
        var inputFrom = document.getElementById('collection_postcode');
        var inputTo = document.getElementById('delivery_postcode');
        autocompleteFrom = new google.maps.places.Autocomplete(inputFrom, null);
        autocompleteTo = new google.maps.places.Autocomplete(inputTo, null);
    });
</script>
