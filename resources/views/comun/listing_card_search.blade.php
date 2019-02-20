@inject('translator', 'App\Providers\TranslationProvider')
<div class="col-12">
    <div class="listing-card">
        @if ( $listing->url_image != "" )
        <div class="image">
            <img src="{{ $listing->url_image }}" />
        </div>
        @else
        <div class="image-icon">
            <img src="archivos/img/delivery-van.png" alt="">
        </div>
        @endif
        <div class="info">
            <div class="row">
                <div class="col-12">
                    <a href="Deliveries.detail?id={{ $listing->id_listing }}&title={{ $listing->title_url }}">
                        {{ $listing->str_title }}
                    </a>
                </div>
                <div class="col-12 col-md-4 mylisting">
                    <p>
                        <i class="fas fa-money-bill-wave"></i> Quotes: {{ $listing->quotes }}
                    </p>
                    <p>
                        <i class="fas fa-tachometer-alt"></i> Distance: {{ $listing->distance }}km
                    </p>
                </div>
                <div class="col-12 col-md-4 mylisting">
                    <p>
                        <i style="color: green;" class="fas fa-map-marker-alt"></i> {{ $listing->collection_postcode }}
                    </p>
                    <p>
                        <i style="color: red;" class="fas fa-map-marker-alt"></i> {{ $listing->delivery_postcode }}                        
                    </p>
                </div>
                <div class="col-12 col-md-4 mylisting">
                    <p>
                        <i style="color: blue;" class="fas fa-clock"></i> Listed: {{ $listing->date_listed }}
                    </p>
                    <p>
                        <i style="color: orange;" class="fas fa-hourglass-end"></i> {{ $listing->expires_in }}                        
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>