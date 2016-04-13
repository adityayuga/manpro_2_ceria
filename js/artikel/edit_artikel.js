$(document).ready(function(){
	var id = window.location.href.slice(window.location.href.indexOf('-') + 1);
	     $.ajax({
			type:"GET",
			data:{ 'id' : id},	
			dataType: "json",
			url: "edit_artikel",
			success: function(result){
				if(result){
					if(result.error_code==0){
						$('#isi_artikel').summernote({
							height: 300,
							minHeight: 400,
							maxHeight: 400,
							focus: true
						});
						$('#isi_artikel').summernote('code', result.data[0].content);
						$('#judul').val(result.data[0].judul);
						if (result.data[0].kategori == "umum") {
							$('.CBumum').prop("checked", true);
						}
						else if(result.data[0].kategori == "selfhelp"){
							$('.CBsh').prop("checked", true);
						}
						else{
							$('.CBact').prop("checked", true);
						}
									
					}else{
						$('.alerts').append("<div class='alert alert-warning text-center' role='alert'><strong>"+ result.data[0].judul +"</strong>"+ result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
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
					  
							$('.tbody').html("");
					        $('.tbody').append(errorsHtml).fadeIn(200).fadeToggle(10000).fadeOut(50);
					    }
					}, "json");

	$('#btn_submit').click(function(){
		var isiArtikel = $('#isi_artikel').summernote('code');
		var judulArtikel = $('#judul').val();
		var kategori = $('input[name="etype"]:checked').val();
		requestUploadArtikel(judulArtikel, isiArtikel, kategori);
	});

	function requestUploadArtikel(judul, isi, kategori){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
			}
		})

		$.ajax({
			type:"POST",
			data: {
				'id' : id,
				'judul' : judul,
				'isi' : isi,
				'kategori' : kategori
			},
			dataType: "json",
			url: "update_artikel",
			success: function(result){
				if(result){
					$('.alerts').html("");
					if(result.error_code==0){
						$('.alerts').append("<div class='alert alert-success text-center' role='alert'><strong>"+ result.error +"</strong>"+ result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
						$('#isi_artikel').summernote('code', '');
						$('#judul').val("");
						$('html, body').animate({
							scrollTop: $('.edittengah').offset().top
						}, 1000);
					}else{
						$('.alerts').append("<div class='alert alert-warning text-center' role='alert'><strong>"+ result.error +"</strong>"+ result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
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