<div class="container-fluid" style="padding: 40px 20px;">
<h4><i class="fas fa-eye"></i> Listings I'm watching</h4>
<div class="width100" id="listings">
    {!! $listado !!}
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