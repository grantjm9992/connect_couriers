@inject('translator', 'App\Providers\TranslationProvider')

<div class="container-fluid" style="max-width: 1100px; margin: 0 auto; padding: 30px 0; max-width: 800px;">

  <a href="MyAccount.myActiveListings" class="btn btn-dark"><i class="fas fa-arrow-left"></i> Back</a>
  <div class="alert alert-dark" style="width: 100%; margin: 20px 0;">
    <h5>Quotes for: {{ $listing->str_title }}</h5>
  </div>
  <div class="row" style="margin: 25px 0 0 0;" id="quotes">
    {!! $quotes !!}
  </div>
  <div class="alert alert-dark" style="width: 100%; margin: 20px 0;">
    <h5>Declined quotes for: {{ $listing->str_title }}</h5>
  </div>
  <div class="row" style="margin: 25px 0 0 0;" id="declined_quotes">
    {!! $declined_quotes !!}
  </div>
</div>

<script>

  var page = 1;
  function pageUp()
  {
      page++;
      searchResults();
  }
  function pageDown()
  {
      page--;
      searchResults();
  }
  
  function getDeclinedQuotes()
  {
    $('#declined_quotes').html('<div style="width: 100%; height: 300px; padding: 100px; text-align: center;"><img src="archivos/data/loading.gif" style="height: 100px; width: 100px;" /></div>');
    $.ajax({
        type: "POST",
        url: "MyListings.declinedQuotes",
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: {
          id: '{{ $listing->id_listing }}',
          page: page
        },
        success: function(data)
        {
            $('#declined_quotes').html(data);
        }
    })
    }

  function searchResults()
  {
    $('#quotes').html('<div style="width: 100%; height: 300px; padding: 100px; text-align: center;"><img src="archivos/data/loading.gif" style="height: 100px; width: 100px;" /></div>');
      $.ajax({
          type: "POST",
          url: "MyListings.paginatedQuotes",
          headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
          data: {
            id: '{{ $listing->id_listing }}',
            page: page
          },
          success: function(data)
          {
              $('#quotes').html(data);
          }
      })
  }

  function declineQuote(id)
  {
    
    $('[quote-id="'+id+'"]').hide(500);
    $.ajax({
      type: "POST",
      url: "Quote.declineQuote",
      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
      data: {
        id_quote: id,
        id_listing: '{{ base64_encode($listing->id_listing) }}'
      },
      success: function(data)
      {
        var response = jQuery.parseJSON(data);
        if ( response.success === 1 )
        {
          $.notify('Quote denied successfully', {
            className: 'success',
            position: "bottom-left"
          });
          $('[quote-id="'+id+'"]').clone().appendTo('#declined_quotes');
          $('[quote-id="'+id+'"]').remove()
        }
        else
        {
          alert(response.message);
          $('[quote-id="'+id+'"]').show();
        }
      }
    })
  }
</script>