@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid">
    <div class="row">
        <div style="margin: 50px auto;" class="col-10">
            <p> Message about delivery: <a href="Deliveries.detail?id={{ $message->id_listing }}">{{ $message->listing }}</a></p>
            <p>
                {{ $message->str_user }} wrote:
            </p>
            <div class="alert alert-success">
                {{ $message->str_message }}
            </div>
            <form action="Messages.send">
                <input type="text" name="id_reciever" value="{{ $message->id_sender }}" hidden>
                <input type="text" name="id_reply_to" value="{{ $message->id }}" hidden>
                <input type="text" name="id_listing" value="{{ $message->id_listing }}" hidden>
                <textarea name="str_message" id="str_message" cols="30" rows="4" class="form-control" placeholder="Reply...">
                </textarea>
                <p style="margin-top: 15px;">
                    <button type="submit" class="btn btn-success">Reply</button>
                </p>
            </form>
        </div>
    </div>
</div>