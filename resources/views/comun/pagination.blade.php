@if ( $data != "" )
{!! $data !!}
<script>
    $(document).ready( function() {
        var down = "{{ $disableddown }}";
        var up = "{{ $disabledup }}";
        if ( up != "" )
        {
            document.getElementById('siguiente').style.pointerEvents = 'none';
        }
        if ( down != "" )
        {
            document.getElementById('anterior').style.pointerEvents = 'none';
        }
    });
</script>
<div style="width: 100%; padding: 40px;">
    <div {{ $disableddown }} class="btn btn-primary {{ $disableddown }}" id="anterior" onclick="pageDown()"><i class="fas fa-arrow-left"></i> Previous</div>
    <div {{ $disabledup }} class="btn btn-primary {{ $disabledup }}" id="siguiente" onclick="pageUp()">Next <i class="fas fa-arrow-right"></i></div>
</div>
@else
<div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 100%;">
  <strong>Holy guacamole!</strong> No quotes found for this listing
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif