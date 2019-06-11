<div style="width: 100%;">
    <h3>
        Hi there,
        @if ( $courier->str_name != "" )
            {{$courier->str_name}}!
        @else
            {{ $courier->str_user }}!
        @endif
    </h3>
    <p>
        There has been a new listing on ConnectCouriers that we think might interest you!
    </p>

    <div style="padding: 25px; width: 90%; margin: 20px 5%; box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3); border: 0.5px solid grey; text-decoration: none !important;">
        <a href="{{ $url }}" style="color: black;">
        <p>
        Title: {{ $listing->str_title }}
        </p>
        <p>
        From: {{ $listing->collection_postcode }}        
        </p>
        <p>
        To: {{ $listing->delivery_postcode }}
        </p>
        @if ( file_exists( $listing->image ) )
        <p>
            <img src="{{ $listing->image }}" alt="" style="max-height: 250px; width: 250px;">        
        </p>
        @endif
        </a>
    </div>
</div>

<p>
    The ConnectCouriers Team!
</p>
<br>
<br>
<p>
    <a href="{{ $unlistURL }}" style="font-size: 10px; color: rgba(0,0,0,0.6);"> 
        Unsubscribe from the list
    </a>
</p>