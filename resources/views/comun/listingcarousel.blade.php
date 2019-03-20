@inject('translator', 'App\Providers\TranslationProvider')
<div class="col-12 col-md-4" style="padding: 20px;">
    <a href="Deliveries.detail?id={{$listing->id_listing}}&title={{$listing->str_title}}">
    <div class="card">
        <div class="card-header">
            {{ $listing->str_title }}
        </div>
        <div class="card-body">
            <div style="width: 100%; height: 200px;line-height: 200px; text-align: center;">
                <img src="{{ $listing->url_image }}" style="max-width: 80%; max-height: 200px;" alt="">
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <p><i class="fas fas-location green"></i> </p>
                    <p>{{ $listing->collection_postcode }}</p>
                </div>
                <div class="col-12 col-md-6">
                    <p><i class="fas fas-location red"></i> </p>
                    <p>{{ $listing->delivery_postcode }}</p>
                </div>
            </div>
        </div>
    </div>
</a>
</div>