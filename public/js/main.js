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
$(document).ready( function() {
	$('img').click( function() {
		closeHolder();
        if ( !$(this).hasAttr('noopen') )
        {
            var url = $(this).attr('src');
            var holder = document.createElement('div');
            holder.id = "img_holder";
            $(holder).css({
                height: "100vh",
                width: "100vw",
                background: "rgba(0,0,0,0.75)",
                position: "fixed",
                top: 0,
                left: 0,
                padding: "50px",
                lineHeight: "calc(100vh - 100px)",
                textAlign: "center",
                zIndex: 10001
            });
            $(holder).html('<img src="'+url+'" style="max-height: 100%; max-width: 100%;">');
            $('body').append(holder);
            $(holder).click( function() {
                closeHolder();
            });
        }
	});
	document.addEventListener("keydown", function(event) {
		if ( event.which === 27 )
		{
			closeHolder();
		}
	});

});

function closeHolder()
{
	$('#img_holder').remove();
}


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


function setUser()
{
    $.ajax({
        type: "POST",
        url: "VerifyUser.setUser",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(data)
        {
        }
    });
}

$('.detail-image > span').on("click", function() {
    var dataId = $(this).data('id');
});

function removeImage(id)
{
    $.ajax({
        type: "POST",
        url: "MyListings.removeImage",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
            id: id
        },
        success: function(data)
        {
            if ( data == "OK" )
            {
                $('[data-id="'+id+'"]').remove();
            }
        }
    });
}