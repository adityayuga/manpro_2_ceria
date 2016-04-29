$(document).ready(function(){
	$('#judul').get(0).focus();

	$('#isi_artikel').summernote({
		height: 300,
		minHeight: 400,
		maxHeight: 900
	});


	
	$("img").addClass("img-responsive");

	$("#inputpicture").change(function(){
	    gantiGambar(this);
	});

	$('#btn_submit').click(function(e){
		e.preventDefault();

		var isiArtikel = $('#isi_artikel').summernote('code');
		var judulArtikel = $('#judul').val();
		var kategori = $('input[name="etype"]:checked').val();
		var deskripsi = $('#deskripsi').val();

		if($('#inputpicture').val() == ""){
			requestUploadArtikel(judulArtikel, isiArtikel, kategori, deskripsi, null);
		}else{
			var ajax = function(imageData){
				requestUploadArtikel(judulArtikel, isiArtikel, kategori, deskripsi, imageData);
			}

			imageupload($('#inputpicture').get(0), ajax);
		}
		
		//requestUploadArtikel(judulArtikel, isiArtikel, kategori, deskripsi);
	});


	function requestUploadArtikel(judul, isi, kategori, deskripsi, imageData){
		console.log(judul);
		console.log(isi);
		console.log(kategori);
		console.log(deskripsi);
		//console.log(imageData);
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
			}
		})

		$.ajax({
			type:"POST",
			data: {
				'judul' 	: judul,
				'isi' 		: isi,
				'kategori' 	: kategori,
				'deskripsi' : deskripsi,
				'image'		: imageData
			},
			dataType: "json",
			url: "post_artikel",
			success: function(result){
				if(result){
					$('.alerts').html("");
					if(result.error_code==0){
						$('#isi_artikel').summernote('code', '');
						$('#judul').val("");
						var inputFile = $('input[name="etype"]:checked');
						inputFile.replaceWith(inputFile.val('umum').clone(true));;
						$('#deskripsi').val("");
						$('#fotoxx').attr('src', null);
						$('#judul').val("");
						$('.alerts').append("<div class='alert alert-success text-center' role='alert'><strong>"+ result.error +"</strong>"+ result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
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
		        $('html, body').animate({
							scrollTop: $('.tambahtengah').offset().top
						}, 1000);
		    }
		}, "json");
	}



	function gantiGambar(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#fotoxx').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }
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