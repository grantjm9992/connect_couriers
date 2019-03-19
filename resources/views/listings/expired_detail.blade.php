@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid">
    <div class="listing">
        <div class="listing-nav">
            <div>
                <div class="btn btn-cc-outline" onclick="history.back()"><i class="fas fa-arrow-left"></i> Return to account</div>
            </div>
            <div>
                <a href="MyListings.relist?id={{ $data->id_listing }}" class="btn btn-success">Relist</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
    
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
                <div class="row" style="height: 200px; text-align: center; margin: 10px 0; width: 100%;border-radius: 4px; border: 1px solid rgba(0,0,0,0.1);">
                <div class="col-12"><h6>Images</h6></div>
                
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
                                    <a href="Couriers?id={{ $data->id_user }}">{{ $data->str_user }} ({{ $data->feedback_user }})</a>
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
                                    Expired On
                                </div>
                                <div class="col-6">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="item-info">
                            <div class="row">
                                <div class="col-6">
                                    Dimensions
                                </div>
                                <div class="col-6">
                                    {{ $data->height }}{{ $data->units }} x {{ $data->width }}{{ $data->units }} x {{ $data->length }}{{ $data->units }}
                                </div>
                            </div>
                        </div>
                        <div class="item-info">
                            <div class="row">
                                <div class="col-6">
                                    Weight
                                </div>
                                <div class="col-6">
                                    {{ $data->weight }} kg
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>