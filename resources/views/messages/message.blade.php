@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid">
    <div class="row">
        <div style="margin: 50px auto;" class="col-10">
            <div class="row" style="justify-content: space-between; min-height: 66px;">
                <div class="col-sm-12 col-md-4">
                    <a href="{{ $url }}" class="btn btn-cc-outline"><i class="fas fa-arrow-left"></i> Back to inbox</a>
                </div>
                @if ( (int)$conversation->bln_is_private === 0 )
                    <div class="col-sm-12 col-md-8 alert alert-warning"><i class="fas fa-exclamation-circle"></i>  All messages in this chat are public and will be displayed on the listing page</div>
                @endif
            </div>
            <h5>Messages for <a href="Deliveries.detail?id={{  $listing->id_listing }}&title={{ $listing->str_title }}">{{ $listing->str_title }}</a></h5>
            <div class="row" id="msgs">
                {!! $msgs !!}
            </div>
            <form action="Messages.send" id="form">
                @if ( (int)$_SESSION['id'] === (int)$conversation->id_user )
                    <input type="text" name="id_receiver" hidden value="{{ $conversation->id_courier }}">
                @else
                    <input type="text" name="id_receiver" hidden value="{{ $conversation->id_user }}">
                @endif
                <input type="text" name="id" value="{{ $conversation->id }}" hidden>
                <textarea name="str_message" id="str_message" cols="30" rows="4" class="form-control" placeholder="Reply..."></textarea>
                <p style="margin-top: 15px;">
                    <div class="btn btn-success" onclick="sendMessage()">Reply</div>
                </p>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready( function() {
        updateScroll();
    })
    function updateScroll(){
        var element = document.getElementById("msgs");
        element.scrollTop = element.scrollHeight;
    }
    function sendMessage()
    {
        $.ajax({
            type: "POST",
            url: "Messages.send",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: $('#form').serialize(),
            success: function(data)
            {
                $('#str_message').val('');
                $('#msgs').html(data);
                updateScroll();
            }
        })
    }
</script>