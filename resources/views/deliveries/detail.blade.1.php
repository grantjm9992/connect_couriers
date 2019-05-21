@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid">
    <div class="listing">
        <div class="row">
            <div class="col-12 col-md-4" id="images">
                {!! $img !!}
            </div>
            <div class="col-12 col-md-8">
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <i class="fas fa-boxes"></i> Items
                    </div>
                    <div class="card-body">
                        <div class="item-info">
                            <div class="row">
                                <div class="col-12">
                                    {{ $data->str_description }}
                                </div>
                                <div class="col-6">
                                    Dimensions: {{ $data->height }}{{ $data->units }} x {{ $data->width }}{{ $data->units }} x {{ $data->length }} {{ $data->length_unit }}
                                </div>
                                <div class="col-6">
                                    Weight: {{ $data->weight }} {{ $data->weight_unit }}
                                </div>
                            </div>
                        </div>
                        @foreach ( $items as $item )
                            <div class="item-info">
                                <div class="row">
                                    <div class="col-12">
                                        {{ $item->str_description }}
                                    </div>
                                    <div class="col-6">
                                        Dimensions: {{ $item->height }}{{ $item->units }} x {{ $item->width }}{{ $item->units }} x {{ $item->length }} {{ $item->length_unit }}
                                    </div>
                                    <div class="col-6">
                                        Weight: {{ $item->weight }} {{ $item->weight_unit }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
            if ( $(this).hasClass('favourite') )
            {
                $(this).removeClass('favourite');
                $(this).find('i').removeClass('fas');
                $(this).find('i').addClass('far');
            }
            else
            {
                i = 1;
                $(this).addClass('favourite');
                $(this).find('i').addClass('fas');
                $(this).find('i').removeClass('far');
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
    $(document).ready( function() {
        $('#images').slick({
            dots: true,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            nextArrow: "<div class='navSlick right'><i class='fas fa-arrow-right'></i></div>",
            prevArrow: "<div class='navSlick left'><i class='fas fa-arrow-left'></i></div>"
        });
    });
</script>