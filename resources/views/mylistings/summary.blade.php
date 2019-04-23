@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid" style="padding: 50px;">
    <div class="buttons">
        <a href="{{ $url }}" class="btn btn-outline-primary">
            Go back
        </a>
    </div>
</div>
<div class="container-fluid">
<div class="row padding25">
    <div class="col-12 col-lg-4">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-12">
                <div class="btn">
                    Mark as complete
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-8">
        <div class="summaryConversation">
            {!! $conversation !!}
        </div>
    </div>
</div>
</div>