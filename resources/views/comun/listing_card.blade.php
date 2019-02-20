@inject('translator', 'App\Providers\TranslationProvider')
<div class="col-12 col-md-6">
    <div class="listing-card">
        <div class="image">
            <img src="{{ $listing['url_image'] }}" />
        </div>
        <div class="info">
            <a href="MyListings.detail?id={{ $listing['id_listing'] }}">
                <div class="title">
                    {{ $listing['str_title'] }}
                </div>
                <div class="detail">
                    <p>{{ $listing["collection_postcode"] }} <i class="fas fa-arrow-right"></i> {{ $listing["delivery_postcode"] }}</p>
                    <p>{{ $listing["str_description"] }}</p>
                    <p>{!! $listing["status"] !!}</p>
                </div>
            </a>    
        </div>
    </div>
</div>