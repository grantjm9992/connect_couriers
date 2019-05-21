@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid" style="max-width: 1100px; padding: 40px 20px;">
    <h4 style="border-bottom: 1px solid; padding-bottom: 15px;">
        <i class="fas fa-pencil-alt"></i>  Edit Listing
        <div class="buttons">
            <a href="MyAccount.myActiveListings" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back</a>
            <div onclick="deleteListing()" class="btn btn-outline-danger">
                <i class="fas fa-minus-circle"></i> Delete
            </div>
            <div class="btn btn-success" onclick="submitForm()"><i class="fas fa-save"></i> Save changes</div>
            <a href="Deliveries.detail?id={{ $listing->id_listing }}&title={{ $listing->str_title }}" class="btn btn-outline-primary">
                <i class="fas fa-user-circle"></i> Public view
            </a>
        </div>
    </h4>
    <form action="MyListings.save">
    <input type="text" name="id_listing" value="{{ $listing->id_listing }}" hidden>
    <input type="text" name="id" value="{{ $listing->id_listing }}" hidden>
    <div class="card">
        <div class="card-header">
            Item details
        </div>
        <div class="card-body">
            <div class="row" style="margin: 0 auto; width: 100%;">
                <div class="form-group col-12 col-sm-6">
                    <label for="str_title">Title</label>
                    <input type="text" required class="form-control" name="str_title" value="{{ $listing->str_title }}">
                </div>
                <div class="form-group col-12 col-sm-6">
                    <label for="id_category">Category</label>
                    <select name="id_category" id="id_category" class="form-control">
                        @foreach( $categories as $category )
                            <option value="{{ $category->id_category }}">{{ $category->str_category }}</option>
                        @endforeach
                    </select>
                    <script>
                        $(document).ready( function() {
                            $('#id_category').val('{{ $listing->id_category }}');
                        })
                    </script>
                </div>
                <h5 class="width100">Items</h5>
                <div class="form-group col-12" id="items">
                    <div class="row item-section">
                        <div class="col-12">
                            <label for="str_description">Description</label>
                            <input name="str_description" value="{{ $listing->str_description }}" id="str_description" type="text"  class="form-control">
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="height" min="0" placeholder="height" value="{{ $listing->height }}" aria-describedby="length_unit">
                                <div class="input-group-append">
                                    <select class="input-group-text" name="length_unit" id="length_unit">
                                        <option value="cm">cm</option>
                                        <option value="m">m</option>
                                        <option value="ft">ft</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="width" min="0"  placeholder="width" value="{{ $listing->width }}" aria-describedby="length_unit">
                                <div class="input-group-append">
                                    <select class="input-group-text" name="length_unit" id="length_unit">
                                        <option value="cm">cm</option>
                                        <option value="m">m</option>
                                        <option value="ft">ft</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="length" min="0"  placeholder="length" value="{{ $listing->length }}" aria-describedby="length_unit">
                                <div class="input-group-append">
                                    <select class="input-group-text" name="length_unit" id="length_unit">
                                        <option value="cm">cm</option>
                                        <option value="m">m</option>
                                        <option value="ft">ft</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" placeholder="weight" name="weight" min="0"  value="{{ $listing->weight }}" aria-describedby="weight_unit">
                                <div class="input-group-append">
                                    <select class="input-group-text" name="weight_unit" id="weight_unit">
                                        <option value="kg">kg</option>
                                        <option value="lb">lb</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! $extraItems !!}
                </div>
                <div class="btn btn-primary" onclick="newItem()">
                    <i class="fas fa-plus"></i> Add Item 
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Collection & Delivery
        </div>
        <div class="card-body">
            <div class="row">
                <div class="form-group col-12 col-sm-4">
                    <label for="collection_postcode">Collection address</label>
                    <input type="text" class="form-control" required name="collection_postcode" id="collection_postcode" value="{{ $listing->collection_postcode }}">
                    <input type="text" name="original_cpo" value="{{ $listing->collection_postcode }}" hidden>
                </div>
                <div class="form-group col-12 col-sm-4">
                    <label for="delivery_postcode">Delivery address</label>
                    <input type="text" class="form-control" required name="delivery_postcode" id="delivery_postcode" value="{{ $listing->delivery_postcode }}">
                    <input type="text" name="original_dpo" value="{{ $listing->delivery_postcode }}" hidden>
                </div>
                <div class="form-group col-12 col-sm-4">
                    <label for="delivery_postcode">Delivery timeframe</label>
                    <input type="text" class="form-control" name="timeframe" id="timeframe" value="" >
                    <input type="text" class="form-control" name="delivery_date" id="delivery_date" value="" style="display: none;">
                </div>
            </div>
        </div>
    </div>
    <button type="submit" id="submit" hidden></button>
    </form>
    <div class="row">
        <div class="form-group col-12">
            <div class="card">
                <div class="card-header">
                    Images
                </div>
                <div class="card-body">
                    <form action="MyListings.uploadImage" class="dropzone" id="my-awesome-dropzone">
                        <input type="text" name="id" hidden value="{{ $listing->id_listing }}">
                        @csrf()
                    </form>
                    <div class="row">
                        <div class="container-fluid">
                            <div style="display: -webkit-box;">
                                {!! $images !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="buttons">
                <div class="btn btn-success" onclick="submitForm()"><i class="fas fa-save"></i> Save changes</div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAs6KdmD9OYa2BHZb734w7dmA0QWWa5Dk&libraries=places"></script>
<script src="{{ asset('/js/dropzone.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/dropzone.css') }}"></script>
<script>
    function submitForm()
    {
        
        $('#submit').click();
    }
    $(document).ready( function() {
        $('[name="length_unit"]').on('change', function() {
            $('[name="length_unit"]').val($(this).val());
        })
        $('[name="length_unit"]').val('{{ $listing->length_unit }}');
        $('[name="weight_unit"]').val('{{ $listing->weight_unit }}');
        var inputFrom = document.getElementById('collection_postcode');
        var inputTo = document.getElementById('delivery_postcode');
        autocompleteFrom = new google.maps.places.Autocomplete(inputFrom, null);
        autocompleteTo = new google.maps.places.Autocomplete(inputTo, null);
    })

    function newItem()
    {
        $.ajax({
            type: "POST",
            url: "MyListings.newItem",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data:
            {
                id_listing: "{{ $listing->id_listing }}"
            },
            success: function(data)
            {
                $('#items').append(data);
            }
        })
    }

    function removeItem(id)
    {
        $.ajax({
            type: "POST",
            url: "MyListings.removeItem",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data:
            {
                id_listing: "{{ $listing->id_listing }}",
                id: id
            },
            success: function(data)
            {
                var s = jQuery.parseJSON(data);
                if ( s.success === 1 )
                {
                    $('[item-id="'+id+'"]').remove();
                }
            }
        })
    }

    function deleteListing()
    {
        var options = Array();
        options.title = "Warning";
        options.type = "confirm";
        options.text = "Are you sure you want to delete the listing? This action cannot be undone";
        options.icon = "warning";
        options.thenFunction = confirmedDelete;
        alert(options);
    }
    function confirmedDelete()
    {
        $.ajax({
            type: "POST",
            url: "MyListings.delete",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data:
            {
                id: "{{ $listing->id_listing }}"
            },
            success: function(data)
            {
                var s = jQuery.parseJSON(data);
                if ( s.success  === 1 )
                {
                    window.location = "MyAccount";
                }
            }
        });
    }
</script>
