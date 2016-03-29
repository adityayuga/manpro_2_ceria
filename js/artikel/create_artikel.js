$(document).ready(function(){
	$('#isi_artikel').summernote({
		height: 300,
		minHeight: 400,
		maxHeight: 400,
		focus: true
	});
	
	$('#isi_artikel').summernote('code', "hello sam er nod");

});