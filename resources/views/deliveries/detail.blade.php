@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid">
    <div class="listing">
        <div class="listing-nav">
            <div>
                <a class="btn btn-cc-outline" href="{{ $url }}"><i class="fas fa-arrow-left"></i> Return </a>
            </div>
            <div>
                @if ( isset( $_SESSION['id_user_type'] ) and $_SESSION['id_user_type'] == "2" )
                    <div onclick="addQuote({{ $data->id_listing }})" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add quote</div>
                @endif
                {!! $buttons !!}
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
                                    <a href="Profiles.detail?id_user={{ $data->id_user }}">{{ $data->str_user }} ({{ $data->feedback_user }})</a>
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
            <div class="col-12" style="margin-bottom: 20px;">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-hand-holding-usd"></i> Quotes
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info">Current lowest quote: {{ $data->lowest_quote }} EUR</div>
                        {!! $quotes !!}
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-question-circle"></i> Questions from transport providers
                        @if ( isset( $_SESSION['id_user_type'] ) and $_SESSION['id_user_type'] == "2" )
                            <div style="display: inline-block; float: right">
                                <span style="cursor: pointer;" class="btn btn-cc" onclick="askQuestion({{$data->id_listing}})">
                                    Ask question
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        {!! $messages !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function askQuestion(id)
    {
        $.ajax({
            type: "POST",
            url: "Messages.newFromModal",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id: id
            },
            success: function(data)
            {
                $('#msgModal').remove();
                $('body').append(data);
            }
        })
    }
    function toggleQuote(id)
    {
        var desc = $('[quote="'+id+'"]');
        if ( $(desc[0]).is(':visible') ) {
            $('[toggle-id="'+id+'"]').html('Show more');
        }
        else {
            $('[toggle-id="'+id+'"]').html('Show less');
        }
        $(desc).toggle(500);
    }
    function addQuote(id)
    {
        $.ajax({
            type: "POST",
            url: "Quote.addModal",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                id: id
            },
            success: function(data)
            {
                $('#quoteModal').remove();
                $('body').append(data);
            }
        })
    }
</script>