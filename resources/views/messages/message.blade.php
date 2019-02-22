@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid">
    <div class="row">
        <div style="margin: 50px auto;" class="col-10">
            <div class="width100" style="display: inline-flex; justify-content: space-between; height: 66px;">
                <div>
                    <a href="{{ $url }}" class="btn btn-cc-outline"><i class="fas fa-arrow-left"></i> Back to inbox</a>
                </div>
                @if ( (int)$conversation->bln_is_private === 0 )
                    <div class="alert alert-warning "><i class="fas fa-exclamation-circle"></i>  All messages in this chat are public and will be displayed on the listing page</div>
                @endif
            </div>
            <h5>Messages for <a href="Deliveries.detail?id={{  $listing->id_listing }}&title={{ $listing->str_title }}">{{ $listing->str_title }}</a></h5>
            <div class="row" id="msgs">
                {!! $msgs !!}
            </div>
            <form action="Messages.send" id="form">
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