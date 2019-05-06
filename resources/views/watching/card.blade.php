<div class="col-12 col-lg-6" style="" listingId="{{ $listing->id_listing }}">
    <div style="width: 94%; margin: 10px 3%; padding: 5px; box-shadow: 0px 0px 1px rgba(0,0,0,0.5); border: 1px solid #e1e1e1; border-radius: 4px">
    <div class="row">
        <div class="col-12 mylisting mylistingtitle" style="max-height: 24px; overflow: hidden;">
            <a href="Deliveries.detail?id={{ $listing->id_listing }}&title={{ $listing->title_url }}">
                {{ $listing->str_title }}
            </a>
            <div toggleFavs="{{ $listing->id_listing }}" class="favourite" style="cursor: pointer; display: inline-block; float: right;"><i class="fas fa-heart red"></i></div>
        </div>
        <div class="col-12 mylisting">
            <i style="color: green;" class="fas fa-map-marker-alt"></i> {{ $listing->collection_postcode }}
        </div>
        <div class="col-12 mylisting">
            <i style="color: red;" class="fas fa-map-marker-alt"></i> {{ $listing->delivery_postcode }}  
        </div>
    </div>
    </div>
</div>