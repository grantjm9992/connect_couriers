<div class="col-12 col-sm-6 col-md-4 col-lg-3" listingId="{{ $listing->id_listing }}">
    <div style="width: calc(100% - 10px); margin: 10px 5px; border: 1px solid #ccc; padding: 25px; box-shadow: 0 0 2px 0 rgba(0,0,0,0.7);">
    <div style="justify-content: space-between; display:inline-flex; width: 100%;">
        <div><a href="Deliveries.detail?id={{ $listing->id_listing }}">{{ $listing->str_title }}</a></div>
        <div toggleFavs="{{ $listing->id_listing }}" class="favourite" style="cursor: pointer;"><i class="fas fa-heart red"></i></div>
    </div>
    <div style="justify-content: space-between; display:inline-flex; width: 100%; margin-top: 10px;">
        <div><i class="fas fa-map-marker-alt green"></i> {{ $listing->collection_postcode }}</div>
        <div><i class="fas fa-map-marker-alt red"></i> {{ $listing->delivery_postcode }}</div>
    </div>
    </div>
</div>