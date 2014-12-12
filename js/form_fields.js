/**
 * Add TB Form classes to all form input fields
*/
jQuery(document).ready(function($) {
	$('textarea').addClass('form-control');
	$('input[type=text]').addClass('form-control');
	$('input[type=email]').addClass('form-control');
	$('input[type=submit]').addClass('btn btn-default')
});