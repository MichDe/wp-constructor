(function($){

$(document).ready(function(){
    $('.constructor .select a').click(function(){
        $(this).parent().find('a').removeClass('selected');
        $(this).addClass('selected');
        var id = $(this).parent().attr('id');
        $('#constructor-' + id).val($(this).attr('name'));
        return false;
    });
    
    $("#constr-themes div").hover(function(){
        $(this).toggleClass('hover');
    },function(){
        $(this).toggleClass('hover');
    });

    $("#constr-themes div:not(.selected)").click(function(){
        if (confirm('All data was reloaded from theme config. Continue?..')) {
            $('#constructor-theme').val($(this).attr('title'));
            $('#constructor-theme-reload').val(1);
            $("#constructor-form").submit();
        }       
    });

    // Admin Tabs
    $('#tabs').tabs({ fxFade: true, fxSpeed: 'fast' });

    // Init Color Picker
    function initColorPicker(el) {
        $('#'+el).ColorPicker({
            color:$('#constructor-'+el).val(),
            onChange: function (hsb, hex, rgb) {
                $('#constructor-'+el).val('#' + hex);
                $('#'+el+' div').css('backgroundColor', '#' + hex);
            }
        })
        .bind('keyup', function(){
            $(this).ColorPickerSetColor(this.value);
        });
    }

    initColorPicker('color_header1');
    initColorPicker('color_header2');
    initColorPicker('color_header3');

    initColorPicker('color_bg');
    initColorPicker('color_bg2');
    initColorPicker('color_title');
    initColorPicker('color_title2');
    initColorPicker('color_text');
    initColorPicker('color_text2');
    initColorPicker('color_border');
    initColorPicker('color_border2');
});

})(jQuery);