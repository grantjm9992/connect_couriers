@if ( count($data) > 0 )
<table style="width: 100%;" id="results">
    <thead style='display: none;'>
        <tr>
            <th></th>
        </tr>   
    </thead>
    <tbody>
        @foreach ( $data as $row )
            <tr listing-id="{{ $row->id_listing }}">
                <td>
                    <div class="col-12">
                        <div class="listing-card" style="min-height: 100px;">
                            <div class="container-fluid">
                                <div class="row xs-center">
                                    <div class="col-12 mylisting">
                                        <p>
                                            <a href="Deliveries.detail?id={{ $row->id_listing }}">
                                                <i class="fas fa-box"></i> {{ $row->str_title }}
                                            </a>
                                        </p>
                                    </div>
                                    <div class="col-12 col-sm-5 mylisting">
                                        <p>
                                            <i class="fas fa-hourglass-end"></i> Expires: {{ $row->expires_on }}
                                        </p>
                                        <p>
                                            <i style="color: green;" class="fas fa-map-marker-alt"></i> {{ $row->collection_postcode }}
                                        </p>
                                        <p>
                                            <i style="color: red;" class="fas fa-map-marker-alt"></i> {{ $row->delivery_postcode }}
                                        </p>
                                    </div>
                                    <div class="col-12 col-sm-7 mylisting">
                                        <p>
                                            <i class="fas fa-comments"></i> Your lowest quote: {{ $row->amount_current }} {{ $row->code_currency }}
                                        </p>
                                        <p>
                                            <i class="far fa-comments"></i> Lowest quote: {{ $row->lowest_quote }}
                                        </p>
                                        <form id="quote_{{ $row->id_listing }}">
                                            <input hidden name="id_listing" value="{{ $row->id_listing }}" type="text">
                                            <input type="text" hidden name="id_quote" value="{{ $row->id_quote }}">
                                            <p>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">£</span>
                                                    </div>
                                                    <input type="text" name="new_quote" class="form-control" placeholder="New quote" aria-label="New quote" aria-describedby="basic-addon1">
                                                </div>
                                            </p>
                                            <p>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">£</span>
                                                    </div>
                                                    <input type="text" name="min_quote" class="form-control" placeholder="New minimum quote" aria-label="New minimum quote" aria-describedby="basic-addon1">
                                                </div>
                                            </p>
                                        </form>
                                        <p>
                                            <div class="btn btn-success" onclick="submitQuote({{ $row->id_quote }}, {{ $row->id_listing }})">
                                                Submit quote
                                            </div>
                                            <div class="btn btn-light" onclick="ignoreQuote({{ $row->id_quote }}, {{ $row->id_listing }})">
                                                Ignore
                                            </div>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="pager"></div>

<script>
function ignoreQuote(id, idListing)
{
    $.ajax({
        type: "POST",
        url: "MyQuotes.ignoreQuote",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            id_quote: id
        },
        success: function (data)
        {
            $('[listing-id="'+idListing+'"]').remove();
            $('#results').DataTable({
                "pageLength": 20,
                searching: false
            });
            $('#results_length').hide();
        },
        error: function(data)
        {
            alert("Error");
        }
    })
}

function submitQuote(id, idListing)
{
    var formid = "#quote_"+idListing;
    $.ajax({
        type: "POST",
        url: "MyQuotes.updateQuote",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: $(formid).serialize(),
        success: function (data)
        {
            $('[listing-id="'+idListing+'"]').remove();
            $('#results').DataTable({
                "pageLength": 20,
                searching: false
            });
            $('#results_length').hide();
        },
        error: function(data)
        {
            alert("Error");
        }
    })
}
    $(document).ready( function()
    {        
        $('#results').DataTable({
            "pageLength": 20,
            searching: false
        });
        $('#results_length').hide();
    })
</script>
@else
<div class="alert alert-warning" style="text-align: center;">
    <i class="fas fa-exclamation-triangle"></i> No data
</div>
@endif