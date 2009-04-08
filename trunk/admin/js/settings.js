(function($){

$(document).ready(function(){
    $('.constructor .select a').click(function(){
        $(this).parent().find('a').removeClass('selected');
        $(this).addClass('selected');
        var id = $(this).parent().attr('id');
        $('#constructor-' + id).val($(this).attr('name'));
        return false;
    });

    // Admin Tabs
    $('#tabs').tabs({ fxFade: true, fxSpeed: 'fast' });

});

})(jQuery);