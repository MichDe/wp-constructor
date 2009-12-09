(function($){
$(document).ready(function(){
	// Select based on images
    $('.constructor .select a').click(function(){
        $(this).parent().find('a').removeClass('selected');
        $(this).addClass('selected');
        var id = $(this).parent().attr('id');
        $('#constructor-' + id).val($(this).attr('name'));
        return false;
    });

    // Checkbox for fieldsets
	$('.constructor fieldset > legend > input:checkbox').bind('check-fieldset', function(){
		var $this = $(this);
		if ($this.is(':checked')) {
			$this.parents('fieldset').find(':input').not(this).removeAttr('disabled');
            $this.parents('fieldset').removeClass('disabled');
		} else {
			$this.parents('fieldset').find(':input').not(this).attr('disabled','disabled');
            $this.parents('fieldset').addClass('disabled');
		}
	}).click(function(){
		$(this).trigger('check-fieldset');
	}).trigger('check-fieldset');
	
    // Admin Tabs
    $('#tabs').tabs({ fxFade: true, fxSpeed: 'fast' });
    
    // Clear input fields values
    $('.clear-link').click(function(){
       $(this).parent().find('input').val('');
       return false;
    });

    $('.donate .close').hover(function(){
        $(this).find('.ui-icon')
            //.removeClass('ui-icon-close')
            .addClass('ui-icon-closethick')
            ;
    },function(){
        $(this).find('.ui-icon')
            .removeClass('ui-icon-closethick')
            //.addClass('ui-icon-close')
            ;
    })
    .click(function(){
        // @todo: not sure to correct way
        $.get('themes.php?page=functions.php&theme-constructor-admin=donate');
        $(this).parent('#message').remove();
        return false;
    });
});
})(jQuery);

/**
 * Get Id element by name
 * @param {String} name
 */
function name2id(name) {
    var name = name.replace(/\]\[/,'-');
        name = name.replace(/\[/,'-');
        name = name.replace(/\]/,'');
    return name;  
}