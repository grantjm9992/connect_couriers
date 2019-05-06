@inject('translator', 'App\Providers\TranslationProvider')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAs6KdmD9OYa2BHZb734w7dmA0QWWa5Dk&libraries=places"></script>
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
                    <input type="text" class="form-control" name="str_title" placeholder="Title">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="collection_postcode" id="collection_postcode" placeholder="Collection PostCode">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="delivery_postcode" id="delivery_postcode" placeholder="Delivery PostCode">
                </div>
                <div class="form-group">
                    <div class="form-check" style="text-align: left;">
                        <input class="form-check-input" type="checkbox" value="" id="bln_flexible">
                        <input type="text" name="bln_flexible" hidden value="0">
                        <label class="form-check-label" for="bln_flexible">
                            I'm flexible
                        </label>
                    </div>
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
        $('#id_category').val('{{ $tipo }}');
        $('#delivery_date').datepicker();
        $('#bln_flexible').on('change', function() {
            if(this.checked ) {
                $('[name="bln_flexible"]').val(1);
                $('.e-datewidget').hide(500);
            } else {
                $('[name="bln_flexible"]').val(0);
                $('.e-datewidget').show(500);
            }
        });
        var inputFrom = document.getElementById('collection_postcode');
        var inputTo = document.getElementById('delivery_postcode');
        autocompleteFrom = new google.maps.places.Autocomplete(inputFrom, null);
        autocompleteTo = new google.maps.places.Autocomplete(inputTo, null);
    });
</script>
