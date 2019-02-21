@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid" style="padding: 40px 15px;">
    <div class="row">
        <div class="col-md-12 col-lg-3">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-filter"></i> {{ $translator->get("filter_results") }}
                </div>
                <div class="card-body">
                    <form action="Deliveries.results" id="search-form">
                        <div class="form-row form-group">
                            <label for="query">{{  $translator->get("search") }}</label>
                            <input type="text" name="query" class="form-control">
                        </div>
                        <div class="form-row form-group">
                            <label for="order">{{ $translator->get("order") }}</label>
                            <select name="order" id="order" class="form-control">
                                <option value="date_listed, DESC">{{ $translator->get("newest_first") }}</option>
                                <option value="date_listed, ASC">{{ $translator->get("oldest_first") }}</option>
                                <option value="quotes, ASC">{{ $translator->get("least_quotes_first") }}</option>
                                <option value="quotes, DESC">{{ $translator->get("most_quotes_first") }}</option>
                                <option value="distance, ASC">{{ $translator->get("shortest_distance_first") }}</option>
                                <option value="distance, DESC">{{ $translator->get("longest_distance_first") }}</option>
                            </select>
                        </div>
                        <div class="form-row form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="no_quotes">
                                <label class="form-check-label" for="no_quotes">
                                    {{ $translator->get("with_no_quotes") }}
                                </label>
                            </div>
                            <input type="text" name="no_quotes" hidden>
                        </div>
                        <!--<div class="form-row form-group">
                            <label for="cpo">{{  $translator->get("collection_postcode") }}</label>
                            <input type="text" name="cpo" class="form-control">
                            <label for="miles_collect">{{  $translator->get("within") }}</label>
                            <select name="miles_collect" id="miles_collect" class="form-control">
                                <option value="">All</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="form-row form-group">
                            <label for="dpo">{{  $translator->get("delivery_postcode") }}</label>
                            <input type="text" name="dpo" class="form-control">
                            <label for="miles_deliver">{{  $translator->get("within") }}</label>
                            <select name="miles_deliver" id="miles_deliver" class="form-control">
                                <option value="">All</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>-->
                        <div class="form-row form-group">
                            <div class="btn btn-primary" onclick="getResults()">
                                {{ $translator->get("search") }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-9" id="listings">
            {!! $listings !!}
            <div id="pager"></div>
            <script>
                $('#results').DataTable({
                    "pageLength": 20,
                    searching: false,
                    "ordering": false
                });
                $('#results_length').hide();            
            </script>
        </div>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script>
    function getResults()
    {
        $('.loader').show();
        $.ajax({
            type: "POST",
            url: 'Deliveries.getListingCards',
            data: $('#search-form').serialize(),
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            success: function(data) {
                $('#listings').html(data);
                $('.loader').hide();
            }
        });
    }
    
    $(document).ready( function() 
    {
        var form = $('#search-form');
        var inputs = $(form).find('input');
        for ( var i = 0; i < inputs.length; i++ )
        {
            $(inputs[i]).on('keyup', function(e) {
                if ( e.which === 13 )
                {
                    getResults();                    
                }
            })
        }
    })
    $('[name="query"]').keyup('click', function(e) {
        if ( e.which === 13 )
        {
            getResults();
        }
    });
    $('#order').on('change', function() {
        getResults();
    })

    $('#no_quotes').on( 'change', function() {
        if ( $(this).is(':checked') )
        {
            $('[name="no_quotes"]').val(1);
        }
        else
        {
            $('[name="no_quotes"]').val(0);
        }
    })
</script>