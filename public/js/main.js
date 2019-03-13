function setLanguageCookie (e) {
    $.cookie("control_sistemas_idioma", e.toString());
    window.location.reload();
}
$(document).on('click', 'a[href^="/#"]', function (event) {
    if (  $($.attr(this, 'href').slice(1)).length > 0 ) {
        event.preventDefault();
    
        $('html, body').animate({
            scrollTop: $($.attr(this, 'href').slice(1)).offset().top
        }, 1000);
    }
});

function listingDetail(row) {
    window.location = "Deliveries.detail?id_listing="+row.data.id;
}

function confirmDelete(id)
{    
    $.ajax({
        type: "POST",
        url: "MyListings.confirmDelete",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            id: id
        },
        success: function(data)
        {
            $('#confirmModal').remove();
            $('body').append(data);
        }
    })
}

function deleteListing(id)
{

    $.ajax({
        type: "POST",
        url: "MyListings.delete",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            id: id
        },
        success: function(data)
        {
            if ( data == "OK" )
            {
                window.location = "MyAccount";
            }
            else
            {
                alert(data);
            }
        }
    })
}

function sendSearchForm()
{
    var div = $(this).closest('.search-form');
    var ul = $(div).attr('action')
    var data_ = $(div).serialize();

    console.log(ul);
    $.ajax({
        type: "POST",
        url: 'Deliveries.returnTable',
        data: data_,
        success: function(data)
        {
            $('#results').html(data);
        }
    })
}

function login()
{
    if ( document.getElementById("loginModal") )
    {
        $('#loginModal').remove();
    }
    $.ajax({
        type: "POST",
        url: "Login.loginModal",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
        },
        success: function(data)
        {
            $('body').append(data);
        }
    });
}

$(document).ready( function() {
    checkNotifications();
    setInterval( function() {
        checkNotifications() }, 5000 );
})

function checkNotifications()
{
    $.ajax({
        type: "POST",
        url: "Notifications.checkNotifications",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(data)
        {
            var s = jQuery.parseJSON( data );
            if ( s.count > 0 )
            {
                for ( var i = 0; i < s.messages.length; i++ )
                {
                    $.notify( s.messages[i], {
                        position: "bottom-left",
                        className: "success"
                    } );
                }
            }
        }
    });
}