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