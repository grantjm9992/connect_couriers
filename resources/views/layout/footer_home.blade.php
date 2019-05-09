@inject('translator', 'App\Providers\TranslationProvider')
<footer>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4">
                <h3 class="small-h3">
                    <a href="Boxes">Box deliveries quotes compare</a>
                </h3>
                <h3 class="small-h3">
                    <a href="Vehicle-Parts">Vehicle parts delivery compare</a>
                </h3>
                <h3 class="small-h3">
                    <a href="Home-And-Garden">Home and Garden deliveries compare</a>
                </h3>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <h3 class="small-h3">
                    <a href="Cars">Car transportation comparison</a>
                </h3>
                <h3 class="small-h3">
                    <a href="Man-And-Van">Man and van compare</a>
                </h3>
                <h3 class="small-h3">
                    <a href="Moving-Home">Home removals</a>
                </h3>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <h3 class="small-h3">
                    <a href="Ebay-Goods">eBay goods delivery compare</a>
                </h3>
                <h3 class="small-h3">
                    <a href="Haulage">Haulage price comparison</a>
                </h3>
                <h3 class="small-h3">
                    <a href="Pets-And-Livestock">Pets and livestock transportation</a>
                </h3>
            </div>
        </div>
        <div class="col-12" style="margin: 20px auto;">
            <div class="social-media">
                <a href="https://www.facebook.com/couriers.connect.9" target="_blank">
                    <i class="fab fa-facebook-square"></i>
                </a>
                <a href="https://twitter.com/couriersconnect" target="_blank">
                    <i class="fab fa-twitter-square"></i>
                </a>
                <a href="https://www.linkedin.com/in/couriers-connect-5447a0181/" target="_blank">
                    <i class="fab fa-linkedin"></i>
                </a>
            </div>
        </div>
</footer>

<script>
    function sendMail()
    {
        $.ajax({
            type: "POST",
            url: "Mail.send",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                email: $('#email').val(),
                message: $('#message').val(),
                name: $('#name').val()
            },
            success: function(data)
            {
                var s = jQuery.parseJSON(data);
                if ( s.success === 1 )
                {
                    $('#mail_form').trigger("reset");
                    var options = Array();
                    options.title = "Success";
                    options.text = "Message sent successfully";
                    options.icon = "success";
                    alert( options );
                }
                else
                {
                    var options = Array();
                    options.title = "Error";
                    options.text = "Oops, something went wrong, please try again";
                    options.icon = "error";
                    alert( options );
                }
            }
        })
    }
</script>