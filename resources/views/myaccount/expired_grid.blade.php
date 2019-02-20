@if ( count($data) > 0 )
<table style="width: 100%;" id="results">
    <thead style='display: none;'>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $data as $row )
            <tr>
                <td>
                    <div class="col-12">
                        <div class="listing-card" style="min-height: 100px;">
                            <div class="container-fluid">
                                <div class="row xs-center">
                                    <div class="col-12 mylisting">
                                        <p>
                                            <a href="Listings.expiredDetail?id={{ $row->id_listing }}">
                                                <i class="fas fa-box"></i> {{ $row->str_title }}
                                            </a>
                                        </p>
                                    </div>
                                    <div class="col-12 col-sm-5 mylisting">
                                        <p>
                                            <i class="fas fa-hourglass-end"></i> Expired: {{ $row->expires_on }}
                                        </p>
                                        <p>
                                            <i class="fas fa-money-bill-wave"></i> <a href="MyListings.quotes?id={{ $row->id_listing }}">Quotes: {{ $row->quotes }}</a>
                                        </p>
                                    </div>
                                    <div class="col-12 col-sm-3 mylisting">
                                        <p>
                                            <i style="color: green;" class="fas fa-map-marker-alt"></i> {{ $row->collection_postcode }}
                                        </p>
                                        <p>
                                            <i style="color: red;" class="fas fa-map-marker-alt"></i> {{ $row->delivery_postcode }}
                                        </p>
                                    </div>
                                    <div class="col-12 col-sm-4 mylisting">
                                        <a href="MyListings.relist?id={{ $row->id_listing }}" class="btn btn-success">Relist</a>
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