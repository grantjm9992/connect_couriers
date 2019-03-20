@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid">
    <div class="listing">
        <div class="listing-nav">
            <div>
                <a class="btn btn-cc-outline" href="{{ $url }}"><i class="fas fa-arrow-left"></i> Return </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-warning"><i class="fas fa-exclamation-circle"></i> This listing has now finished</div>
            </div>
            <div class="col-12 col-md-6" style="margin-bottom: 20px;">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-info-circle"></i> Listing Info
                    </div>
                    <div class="card-body">
                        <div class="item-title cc">
                            {{ $data->str_title }}
                        </div>
                        {{ $data->str_description }}
                    </div>
                </div>
                <div style="margin-top: 10px;" class="card">
                    <div class="card-header">
                        <i class="fas fa-file-image"></i> Images
                    </div>
                    <div class="card-body row">
                        {!! $img !!}
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6" style="margin-bottom: 20px;">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-file-alt"></i> Listing Details
                    </div>
                    <div class="card-body">
                        <div class="item-info">
                            <div class="row">
                                <div class="col-6">
                                    User
                                </div>
                                <div class="col-6">
                                    <a href="Users?id={{ $data->id_user }}">{{ $data->str_user }} ({{ $data->feedback_user }})</a>
                                </div>
                            </div>
                        </div>
                        <div class="item-info">
                            <div class="row">
                                <div class="col-6">
                                    Collection Postcode
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-map-marker-alt green"></i>   {{ $data->collection_postcode }}
                                </div>
                            </div>
                        </div>
                        <div class="item-info">
                            <div class="row">
                                <div class="col-6">
                                    Delivery Postcode
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-map-marker-alt red"></i>   {{ $data->delivery_postcode }}
                                </div>
                            </div>
                        </div>
                        <div class="item-info">
                            <div class="row">
                                <div class="col-6">
                                    Date Listed
                                </div>
                                <div class="col-6">
                                    {{ $data->date_listed }}
                                </div>
                            </div>
                        </div>
                        <div class="item-info">
                            <div class="row">
                                <div class="col-6">
                                    Expires On
                                </div>
                                <div class="col-6">
                                    {{ $data->expires_on }}
                                </div>
                            </div>
                        </div>
                        <div class="item-info">
                            <div class="row">
                                <div class="col-6">
                                    Dimensions
                                </div>
                                <div class="col-6">
                                    {{ $data->height }}{{ $data->units }} x {{ $data->width }}{{ $data->units }} x {{ $data->length }} {{ $data->length_unit }}
                                </div>
                            </div>
                        </div>
                        <div class="item-info">
                            <div class="row">
                                <div class="col-6">
                                    Weight
                                </div>
                                <div class="col-6">
                                    {{ $data->weight }} {{ $data->weight_unit }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>