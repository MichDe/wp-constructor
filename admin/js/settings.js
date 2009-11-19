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