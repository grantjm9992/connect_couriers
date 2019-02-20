@if ( count($data) > 0 )
<table style="width: 100%;" id="accresults">
    <thead style='display: none;'>
        <tr>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ( $data as $row )
            <tr>
                <td>
                    <div class="col-12">
                        <div class="listing-card">
                            @if ( $row->url_image != "" )
                            <div class="image">
                                <img src="{{ $row->url_image }}" />
                            </div>
                            @else
                            <div class="image-icon">
                                <img src="archivos/img/delivery-van.png" alt="">
                            </div>
                            @endif
                            <div class="info">
                                    <div class="title">
                                        {{ $row->str_title }}
                                    </div>
                                    <div class="detail row" style="margin: 0;">
                                        <div class="col-6">
                                            <div class="row">
                                                {{ $row->str_description }}
                                            </div>
                                            <div class="row">
                                                Quotes: 
                                            </div>
                                            <div class="row">
                                                Date listed: 
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <a href="MyListings.detail?id={{ $row->id_listing }}" class="btn btn-outline-success">View summary</a>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div id="pager"></div>

<script>
    $(document).ready( function()
    {        
        $('#accresults').DataTable({
            "pageLength": 5,
            searching: false
        });
        $('#accresults_length').hide();
    })
</script>
@else
<div class="alert alert-warning" style="text-align: center;">
    <i class="fas fa-exclamation-triangle"></i> No data
</div>
@endif