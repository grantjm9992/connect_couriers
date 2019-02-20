@inject('translator', 'App\Providers\TranslationProvider')

<div class="container-fluid" style="max-width: 1100px; margin: 0 auto; padding: 20px 0 0 0;">

  <div class="alert alert-cc" style="width: 100%; margin: 20px 0;">
    <h5>Quotes for <span style="font-style: italic;"><a href="MyListings.detail?id={{ $listing->id }}">{{ $listing->str_title }}</a></span></h5>
  </div>
</div>