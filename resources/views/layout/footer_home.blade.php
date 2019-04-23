@inject('translator', 'App\Providers\TranslationProvider')
<footer>
    <div class="row">
        <div class="col-12 col-sm-6" style="margin: 0 auto;">
            <div class="row" style="padding: 15px 0 5px 0; text-align: center;">
                <div class="col-12"><h4>Contact Us</h4></div>
            </div>
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
            <form style="width: 100%;" id="mail_form">
                <div class="row">
                    <div class="col-12 form-group">
                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-group">
                        <input type="text" class="form-control" id="email" placeholder="Your Email">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-group">
                        <textarea type="text" class="form-control" id="message" placeholder="Your Message"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 form-group">
                        <div class="btn btn-success-outline" onclick="sendMail()">Send</div>
                    </div>
                </div>
            </form>
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