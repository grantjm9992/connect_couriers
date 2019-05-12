function ccAlert( options, link = null )
{
    var config = Array();
    config.iconClass = null;
    config.text = "";
    config.isLink = false;
    config.url = null;
    config.content = null;
    config.title = "";
    config.position = "bottom-left";
    config.class = "alert-success";
    config.autoRemove = false;
    config.timeOut = 5000;
    config.clickToRemove = true;
    config.effect = "slide";
    config.effectDelay = 500;
    var position = Array();

    if ( typeof options === "string" )
    {
        config.text = options;
        if ( link !== null )
        {
            config.url = link;
            config.isLink = true;
        }
    }
    else
    {
        $.extend( config, options );
    }

    var holder = document.getElementById('ccAlertHolder');
    if ( !holder )
    {
        holder = document.createElement('div');
        holder.id = "ccAlertHolder";
        $(holder).addClass('ccAlertHolder');
        
        if ( config.position == "bottom-left" )
        {
            position.left = "20px";
            position.bottom = "20px";
            position.top = "unset";
            position.right = "unset";
        }
        if ( config.position == "bottom-right" )
        {
            position.right = "20px";
            position.bottom = "20px";
            position.top = "unset";
            position.left = "unset";
        }
        if ( config.position == "top-left" )
        {
            position.top = "20px";
            position.left = "20px";
            position.bottom = "unset";
            position.right = "unset";
        }
        if ( config.position == "top-right" )
        {
            position.top = "20px";
            position.right = "20px";
            position.bottom = "unset";
            position.left = "unset";
        }
        $(holder).css({
            top: position.top,
            left: position.left,
            right: position.right,
            bottom: position.bottom,
            position: "fixed"
        });
        $('body').append(holder);
    }

    var effectIn = function() {show(config.effectDelay);}
    var effectOut = function() { hide(config.effectDelay);}
    if ( config.effect == "slide" )
    {
        effectIn = function () {
            $(element).slideDown(config.effectDelay);
        }
        effectOut = function () {
            $(element).slideUp(config.effectDelay);
        }
    }
    if ( config.effect == "fade" )
    {
        effectIn = function () {
            $(element).fadeIn(config.effectDelay);
        }
        effectOut = function () {
            $(element).fadeOut(config.effectDelay);
        }
    }
    if ( config.effect == "bounce" )
    {
        effectIn = function () {
            $(element).bounceIn(config.effectDelay);
        }
        effectOut = function () {
            $(element).bounceOut(config.effectDelay);
        }
    }
    var element = document.createElement('div');
    var notices = $('.ccAlert');
    $(element).addClass('ccAlert');
    $(element).css({
        display: "none"
    });
    var alert = document.createElement('div');
    $(alert).addClass('alert');
    $(alert).addClass(config.class);
    var html = "";
    if ( config.content === null )
    {
        var icon = "";
        if ( config.iconClass !== null )
        {
            icon = "<i class='"+config.iconClass+"'></i>";
        }
        if ( config.isLink === true )
        {
            var a = document.createElement('a');
            $(a).attr('href', config.url );
            $(a).html( icon + config.text );
            html = a;
        }
        else
        {
            html = icon + config.text;
        }

    }
    else
    {
        html = config.content;
    }
    $(alert).html( html );
    $(element).append( alert );
    $(holder).append( element );
    effectIn();
    if ( config.autoRemove === true )
    {
        setTimeout( function()
        {
            effectOut();
            $(element).remove();
            var remaining = $('#ccAlertHolder > *');
            if ( remaining.length === 0 )
            {
                $('#ccAlertHolder').remove();
            }
        }, config.timeOut);
    }
    if ( config.clickToRemove === true )
    {
        $(element).on("click", function() {
            effectOut();
            $(element).remove();
            var remaining = $('#ccAlertHolder > *');
            if ( remaining.length === 0 )
            {
                $('#ccAlertHolder').remove();
            }
        });
    }
}