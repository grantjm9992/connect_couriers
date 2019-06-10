@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid">
    <div class="listing">
        <div class="listing-nav">
            <div>
                <a class="btn btn-cc-outline" href="{{ $url }}"><i class="fas fa-arrow-left"></i> Return </a>
            </div>
            <div>
                @if ( isset( $_SESSION['id_user_type'] ) and $_SESSION['id_user_type'] == "2" )
                    @if ( $data->is_favourite === 1 )
                    <div class="btn btn-outline-success fav" toggleFavs>
                        <i class="fas fa-eye"></i>
                        <span>
                            Stop watching
                        </span>
                    </div>
                    @else
                    <div class="btn btn-outline-success" toggleFavs>
                        <i class="fas fa-eye"></i> 
                        <span>
                            Watch this listing
                        </span>
                    </div>
                    @endif
                    <div onclick="addQuote({{ $data->id_listing }})" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add quote</div>
                @endif
                {!! $buttons !!}
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 text-center" id="images">
                @if ( $img != "" )
                    {!! $img !!}
                @else
                    <img src="archivos\img\delivery-van.png" noopen style="max-height: 100%; max-width: 100%;">
                @endif
            </div>
            <div class="col-12 col-md-8" style="padding: 0 0 0 10px;">
                <div class="container-fluid" style="border-left: 1px solid rgba(0, 0, 0, 0.15);">
                    <p>
                        User: <a href="Users?id={{$data->id_user}}">
                            {{ $data->str_user }} ({{ $data->feedback_user }})
                        </a>
                    </p>
                    <p>
                        {{ $data->str_title }}
                    </p>
                    <p>
                        <i class="fas fa-map-marker-alt green"></i> {{ $data->collection_postcode }}
                    </p>
                    <p>
                        <i class="fas fa-map-marker-alt red"></i> {{ $data->delivery_postcode }}
                    </p>
                    <p>
                        <i class="fas fa-clock"></i> {{ $data->distance }}
                    </p>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-boxes"></i> Items
                    </div>
                    <div class="card-body">
                        <div class="item-info">
                            <div class="row">
                                @if ( $data->str_description != "" )
                                <div class="col-12">
                                    {{ $data->str_description }}
                                </div>
                                <div class="col-12 col-md-6">
                                    Dimensions:
                                    @if ( $data->height != "" )
                                    {{ $data->height }}{{ $data->units }} x {{ $data->width }}{{ $data->units }} x {{ $data->length }} {{ $data->length_unit }}
                                    @else
                                    N/A
                                    @endif
                                </div>
                                <div class="col-12 col-md-6">
                                    Weight:
                                    @if ( $data->height != "" )
                                     {{ $data->weight }} {{ $data->weight_unit }}
                                    @else
                                    N/A
                                    @endif
                                </div>
                                @endif
                            </div>
                        </div>
                        @foreach ( $items as $item )
                            <div class="item-info">
                                <div class="row">
                                    <div class="col-12">
                                        {{ $item->str_description }}
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Dimensions:
                                        @if ( $item->height != "" )
                                        {{ $item->height }}{{ $item->units }} x {{ $item->width }}{{ $item->units }} x {{ $item->length }} {{ $item->length_unit }}
                                        @else
                                        N/A
                                        @endif
                                    </div>
                                    <div class="col-12 col-md-6">
                                        Weight:
                                        @if ( $item->height != "" )
                                        {{ $item->weight }} {{ $item->weight_unit }}
                                        @else
                                        N/A
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12" style="margin-bottom: 20px;">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-hand-holding-usd"></i> Quotes
                    </div>
                    <div class="card-body">
                        @if ( $quotes != "" )
                        <div class="alert alert-info">Current lowest quote: {{ $data->lowest_quote }} GBP</div>
                        @else
                        <div class="alert alert-warning"><i class="fas fa-exclamation-circle"></i>  No quotes have been placed</div>
                        @endif
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
                        @if ( $messages == "" )
                        <div class="alert alert-warning">No questions asked</div>
                        @endif
                        {!! $messages !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready( function()
    {
        $('[toggleFavs]').click( function() {
            var i = 0;
            if ( $(this).hasClass('fav') )
            {
                $(this).removeClass('fav');
                $(this).find('span').html('Watch this listing')
            }
            else
            {
                i = 1;
                $(this).addClass('fav');
                $(this).find('span').html('Stop watching')
            }
            $.ajax({
                type: "POST",
                url: "MyAccount.toggleFavs",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: {
                    id: '{{ $data->id_listing }}'
                },
                success: function(data)
                {
                    var s = jQuery.parseJSON(data);
                    if ( s.success === 1 )
                    {
                        var message = "";
                        if ( i === 1 )
                        {
                            message = "Added to watching list.";
                        }
                        else
                        {
                            message = "Removed from watching list.";
                        }
                        ccAlert(message)
                    }
                }
            });
        });
    })
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
    @if ( $img != "" )
        $(document).ready( function() {
            $('#images').slick({
                dots: true,
                nextArrow: "<div class='navSlick right'><i class='fas fa-arrow-right'></i></div>",
                prevArrow: "<div class='navSlick left'><i class='fas fa-arrow-left'></i></div>"
            });
        });
    @endif
</script>