$(document).ready(function(){
	$('#isi_artikel').summernote({
		height: 300,
		minHeight: 400,
		maxHeight: 400,
		focus: true
	});
	
	$('#isi_artikel').summernote('code', "hello sam er nod");


	$('#btnSubmit').click(function(){
		var isiArtikel = $('#isi_artikel').summernote('code');
		var judulArtikel = $('#judul').val();
		var kategori = $('input[name="etype"]:checked').val();
		requestUploadArtikel(judulArtikel, isiArtikel, kategori);
	});

	function requestUploadArtikel(judul, isi, kategori){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN':$('meta-[name="csrf_token"]').attr('content')
			}
		});

		$.ajax({
			type:'POST',
			data: {
				'judul' : judul,
				'isi' : isi,
				'kategori' : kategori
			},
			dataType: "json",
			url: "upload_artikel",
			success : function(result){
				if (result) {
					$('.alerts').html("");
					if (result_error_code==0) {
						$('.alerts').append("<div class='alert alert-success text-center' role='alert'><strong>"+result.error+"</strong>"+result.message+"</div>").fadeIn(200);	
					}
					else{
						$('.alerts').append("<div class='alert alert-warning text-center' role='alert'><strong>"+result.error+"</strong>"+result.message+"</div>").fadeIn(200);
					}
				}
			},

			error:function(jqXhr){
				if (jqXhr.status == 422) {
					var errors = jqXhr.responseJSON;
					console.log(errors);

					errorHtml = "<div class='alert alert-warning text-center' role='alert'>";

					$.each(errors, function(key, value){
						errorHtml += value[0];
						console.log(value[0]);					
					});

					errorHtml += "</div>";

					$('.alerts').html("");
					$('.alerts').append(errorHtml).fadeIn(200);
				}
				else{
					$('alerts').html("");
					$('alerts').append("Something Error!").fadeIn(200);
						
				}
			}
	  	},  "json");
	}
});