
<div class="container-fluid" style="padding: 40px 15px; max-width: 1100px; margin: 0 auto;">
<div class="row">
    <div class="col-12 col-md-4 col-lg-3 col-xl-3">
        <div class="list-group">
            <a href="MyAccount" class="list-group-item list-group-item-action"><i class="fas fa-tachometer-alt"></i> Summary</a>
            <a href="MyQuotes.myActiveQuotes" class="list-group-item list-group-item-action"><i class="fas fa-box-open"></i> Active Quotes</a>
            <a href="MyQuotes.myOutbidQuotes" class="list-group-item list-group-item-action"><i class="fas fa-thumbs-down"></i> Outbid Quotes</a>
            <a href="Watching" class="list-group-item list-group-item-action"><i class="fas fa-eye"></i> Listings I'm watching</a>
            <a href="MyQuotes.myAcceptedQuotes" class="list-group-item list-group-item-action"><i class="fas fa-check-circle"></i> Accepted Quotes</a>
            <a href="MyQuotes.myUnsuccessfulQuotes" class="list-group-item list-group-item-action"><i class="fas fa-times-circle"></i> Unsuccessful Quotes</a>
            <a href="MyQuotes.myCompletedQuotes" class="list-group-item list-group-item-action"><i class="fas fa-handshake"></i> Completed Quotes</a>
            <a href="Messages" class="list-group-item list-group-item-action"><i class="fas fa-envelope"></i> Messages</a>
            <a href="MyAccount.detail" class="list-group-item list-group-item-action"><i class="fas fa-user-circle"></i> Account</a>
        </div>
    </div>
    <div class="col-12 col-md-8 col-lg-9"  id="listings">
        <h4><i class="fas fa-eye"></i> Listings I'm watching</h4>
        {!! $listado !!}
    </div>
</div>
</div>

<script>
    $(document).ready( function() {
        
        $('body').delegate('[toggleFavs]', 'click', function() {
            var i = 0;
            var id = $(this).attr('toggleFavs');
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
                    id: id
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
                        $.notify(message, {
                            className: "success",
                            position: "bottom-left"
                        });
                    }
                }
            });
        });
    });

    function pageUp(page)
    {
        var page = page + 1;
        $.ajax({
            type: "POST",
            url: "Watching.paginatedList",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                page: page
            },
            success: function(data)
            {
                $('#listings').html(data);
            }
        });
    }
    function pageDown(page)
    {
        var page = page - 1;
        $.ajax({
            type: "POST",
            url: "Watching.paginatedList",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                page: page
            },
            success: function(data)
            {
                $('#listings').html(data);
            }
        });
    }
</script>