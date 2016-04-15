$(document).ready(function(){
	$('#isi_artikel').summernote({
		height: 300,
		minHeight: 400,
		maxHeight: 400,
		focus: true
	});
	
	//$('#isi_artikel').summernote('code', "hello sam er nod");

	$('#btn_submit').click(function(){
		var isiArtikel = $('#isi_artikel').summernote('code');
		var judulArtikel = $('#judul').val();
		var kategori = $('input[name="etype"]:checked').val();
		var deskripsi = $('#deskripsi'.val();)
		requestUploadArtikel(judulArtikel, isiArtikel, kategori, deskripsi);
	});


	function requestUploadArtikel(judul, isi, kategori, deskripsi){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
			}
		})

		$.ajax({
			type:"POST",
			data: {
				'judul' : judul,
				'isi' : isi,
				'kategori' : kategori,
				'deskripsi' : deskripsi
				
			},
			dataType: "json",
			url: "post_artikel",
			success: function(result){
				if(result){
					$('.alerts').html("");
					if(result.error_code==0){
						$('.alerts').append("<div class='alert alert-success text-center' role='alert'><strong>"+ result.error +"</strong>"+ result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
						$('#isi_artikel').summernote('code', '');
						$('#judul').val("");
						//document.getElementById("deskripsi").val()="";
						$('html, body').animate({
							scrollTop: $('.tambahtengah').offset().top
						}, 1000);

					}else{
						$('.alerts').append("<div class='alert alert-warning text-center alert-message' role='alert'><strong>"+ result.error +"</strong>"+ result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
					}
				}
			},
			error : function(jqXhr) {
		        var errors = jqXhr.responseJSON; 
		        //console.log(jqXhr);

		        errorsHtml = "<div class='alert alert-warning text-center' role='alert'>";

		        $.each( errors , function( key, value ) {
		            errorsHtml +=  value[0] ; 
		            //console.log(value[0]);
		        });

		        errorsHtml += "</div>";
		  
				$('.alerts').html("");
		        $('.alerts').append(errorsHtml).fadeIn(200).fadeToggle(10000).fadeOut(50);
		    }
		}, "json");
	}
});