@inject('translator', 'App\Providers\TranslationProvider')
<div class="container-fluid">
    <div class="row">
        <div style="margin: 50px auto;" class="col-10">
        <div style="margin: 0 0 40px 0;">
            <a href="MyAccount" class="btn btn-cc-outline"><i class="fas fa-user-circle"></i> Back to my account</a>
        </div>

            {!! $table !!}
        </div>
    </div>
</div>