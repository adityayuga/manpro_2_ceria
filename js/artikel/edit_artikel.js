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
						$('#deskripsi').val(result.data[0].deskripsi);
						$('#judul').val(result.data[0].judul);
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
						$('#btn_submit').click(function(e){
							e.preventDefault();

							var isiArtikel = $('#isi_artikel').summernote('code');
							var judulArtikel = $('#judul').val();
							var deskripsiArtikel  = $('#deskripsi').val();
							var kategori = $('input[name="etype"]:checked').val();
							if($('#inputpicture').val() == ""){
								requestUploadArtikel(judulArtikel, isiArtikel, kategori, deskripsiArtikel, null);
							}else{
								var ajax = function(imageData){
									requestUploadArtikel(judulArtikel, isiArtikel, kategori, deskripsiArtikel, imageData);
								}

								imageupload($('#inputpicture').get(0), ajax);
							}
							
							
						});
									
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

	function requestUploadArtikel(judul, isi, kategori, deskripsi, imageData){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
			}
		})

		$.ajax({
			type:"POST",
			data: {
				'id'		: id,
				'judul' 	: judul,
				'isi' 		: isi,
				'kategori' 	: kategori,
				'deskripsi' : deskripsi,
				'image'		: imageData
			},
			dataType: "json",
			url: "update_artikel",
			success: function(result){
				if(result){
					window.location.href = "kelola";
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

	function imageupload(element, ajax){
		console.log('testimageupload');
		
	    var elementId = element.id;

	    if(element.files && element.files[0]){
	        var file = element.files[0];
	        var validFileType = ".jpg, .png, .bmp";
	        var extension = file.name.substring(file.name.lastIndexOf('.')).toLowerCase();
	        $("#"+elementId+"-show").attr('src', "");

	        console.log(extension);

	        //validatefile
	        if(validFileType.toLowerCase().indexOf(extension)<0){
	            $("#"+elementId+"-alert").show();
	            $("#"+elementId+"-show")
	            .attr('style', '')
				.css('height','auto')
	            return;
	        }
	        $("#"+elementId+"-alert").hide();

	        //showfile
	        var reader = new FileReader();
	        reader.onload = function(e){
	        	ajax(e.target.result);
	        }

	        if (reader.readAsDataURL) {reader.readAsDataURL(element.files[0]);}
	        else if(reader.readAsDataurl) {reader.readAsDataurl(element.files[0]);}
	        else if(reader.readAsDataUrl) {reader.readAsDataUrl(element.files[0]);}

	    }
	    else{
	    	console.log('else');
	        $(elementId+"-show").attr('src',"");
	    }
	}
});