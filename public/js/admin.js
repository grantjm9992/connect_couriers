
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