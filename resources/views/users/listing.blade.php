<div style="width: 100%; max-width: 800px; padding: 25px; margin: 10px auto; box-shadow: 0 0 2px rgba(0,0,0,0.3);">
    <a href="Deliveries.detail?id={{ $listing->id_listing }}&title={{ $listing->str_title }}">
        <div class="row">
            <div class="col-12 order-1 title">
                {{ $listing->str_title }}
            </div>
            <div class="col-12 order-2 col-md-6">
                <i class="fas fa-map-marker-alt green"></i> {{ $listing->collection_postcode }}
            </div>
            <div class="col-12 order-4 col-md-6 order-md-2">
                <i class="fas fa-map-marker-alt red"></i> {{ $listing->delivery_postcode }}
            </div>
            <div class="col-12 order-3 col-md-6 order-md-3">
                <i class="fas fa-tachometer-alt"></i> {{ $listing->distance }}
            </div>
            <div class="col-12 order-5 col-md-6">
                <i class="fas fa-hourglass-end orange"></i> {{ $listing->expires_on }}
            </div>
        </div>
    </a>
</div>