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
                <div class="col-12 mylisting mylistingtitle" style="max-height: 24px; overflow: hidden;">
                    <a href="Deliveries.detail?id={{ $listing->id_listing }}&title={{ $listing->title_url }}">
                        {{ $listing->str_title }}
                    </a>                
                </div>
                <div class="col-12 order-4 order-md-1 col-md-4 mylisting">
                    <i class="fas fa-money-bill-wave"></i> Quotes: {{ $listing->quotes }}                
                </div>
                <div class="col-12 order-2 order-md-2 col-md-4 mylisting">
                    <i style="color: green;" class="fas fa-map-marker-alt"></i> {{ $listing->collection_postcode }}
                </div>
                <div class="col-12 order-7 order-md-3 col-md-4 mylisting">
                    <i style="color: blue;" class="fas fa-clock"></i> Listed: {{ $listing->date_listed }}
                </div>
                <div class="col-12 order-5 order-md-4 col-md-4 mylisting">
                    <i class="fas fa-tachometer-alt"></i> Distance: {{ $listing->distance }}
                </div>
                <div class="col-12 order-3 order-md-5 col-md-4 mylisting">
                    <i style="color: red;" class="fas fa-map-marker-alt"></i> {{ $listing->delivery_postcode }}  
                </div>
                <div class="col-12 order-6 order-md-6 col-md-4 mylisting">
                    <i style="color: orange;" class="fas fa-hourglass-end"></i> {{ $listing->expires_in }}
                </div>
            </div>
        </div>
    </div>
</div>