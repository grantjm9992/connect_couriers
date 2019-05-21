@if ( $data != "" && count( $data ) > 0)
<style>
</style>
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
                        
                        <div class="listing-card">
                            @if ( $row->url_image != "" )
                            <div class="image">
                                <img src="{{ $row->url_image }}" />
                            </div>
                            @else
                            <div class="image-icon">
                                <img src="archivos/img/delivery-van.png" alt="">
                            </div>
                            @endif
                            <div class="info">
                                <div class="row">
                                    <div class="col-12 mylisting mylistingtitle" style="max-height: 24px; overflow: hidden;">
                                        <a href="MyListings.detail?id={{ $row->id_listing }}">
                                            {{ $row->str_title }}
                                        </a>                
                                    </div>
                                    <div class="col-12 order-4 order-lg-1 col-lg-4 mylisting" title="View quotes">
                                        <a href=""><i class="fas fa-money-bill-wave"></i> Quotes: {{ $row->quotes }}</a>
                                    </div>
                                    <div class="col-12 order-2 order-lg-2 col-lg-4 mylisting">
                                        <i style="color: green;" class="fas fa-map-marker-alt"></i> {{ $row->collection_postcode }}
                                    </div>
                                    <div class="col-12 order-7 order-lg-4 col-lg-4 mylisting">
                                        <i style="color: blue;" class="fas fa-clock"></i> Listed: {{ $row->date_listed }}
                                    </div>
                                    <div class="col-12 order-9 order-lg-3 col-lg-4 mylisting">
                                        <a href="MyListings.detail?id={{ $row->id_listing }}" class="btn btn-outline-success">
                                            <i class="fas fa-pencil-alt"></i> Edit listing
                                        </a>
                                    </div>
                                    <div class="col-12 order-3 order-lg-5 col-lg-4 mylisting">
                                        <i style="color: red;" class="fas fa-map-marker-alt"></i> {{ $row->delivery_postcode }}  
                                    </div>
                                    <div class="col-12 order-6 order-lg-6 col-lg-4 mylisting">
                                        <i style="color: orange;" class="fas fa-hourglass-end"></i> {{ $row->expires_on }}
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
<div class="row">
    <div class="col-12 col-md-8">
        <div class="alert alert-success" style="">
            <i class="fas fa-exclamation-triangle"></i>  No results found.
        </div>
    </div>
    <div class="col-12 col-md-4">
        <a href="Listings.new" class="btn btn-outline-success buttons">
            <i class="fas fa-plus-circle"></i> Add new listing
        </a>        
    </div>
</div>
@endif