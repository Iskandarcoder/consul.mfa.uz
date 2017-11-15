$(document).ready(function() {
	//$('.title').append('<span></span>');
	$('.post input').each(function() {
		var trigger = $(this), state = true, el = trigger.parent().next('.entry');
		trigger.click(function(){
			state = !state;
			el.slideToggle();
			trigger.parent().parent().toggleClass('inactive');
		});
	});
});
function selectByName(form,cname) {
    for (var i = 0; i < form.length; i++) {
        var checkbox = form.elements[i];
       if (!checkbox.checked && checkbox.name==cname)
       { //alert(checkbox.checked)
         for (var i = 0; i <= form.length; i++) {
        var checkbox = form.elements[i];
          checkbox.disabled = false;
       }
       }
        if (checkbox.type == 'checkbox' && checkbox.name != cname)
          checkbox.disabled = true;
    }
}