
function requestEditArtikel(id){
				$.ajax({
	                url: 'editArtikel-{id}',
	                type: 'GET',
	                data: { id: id },
	                success: function(response)
	                {
	                    window.location.replace("editArtikel-"+id+"");
						
	                }
	            });
		}

$(document).ready(function(){

			
    		var search = $('#cari').val();
			requestLoadArtikel(search);	
	 		
	 		$('#cari').keyup(function(){
	 			search = $('#cari').val();
	 			requestLoadArtikel(search);	
	 			
	 		});

			$('#btn_cancel').click(function (){
				var kosong = "";
				requestLoadArtikel(kosong);
			});


            function requestLoadArtikel(kataKunci){

					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
						}
					})
            		$.ajax({
						type:"POST",
						data:{
							'kataKunci' : kataKunci
						},	
						dataType: "json",
						url: "kelola_artikel",
						success: function(result){
							if(result){
								$('.alert').html("");
								$('tbody').html("");
								if(result.error_code==0){
									var count = 0;
									$.each( result.data, function() {
									
									var date = new Date ( result.data[count].created_at );
									var weekdays = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

									var weekday = weekdays[date.getDay()];
									var tgl = date.getDate();
									var bulan = date.getMonth()+1;
									var tahun = date.getFullYear();

									count +=1;
										$('tbody').append(
										"<tr class='"+count+"'>"+
										"<td>"+count+"</td> <td>"+result.data[count-1].judul+"</td>"+
										"<td>"+ weekday +" , "+ tgl + "/" + bulan+ "/" +tahun+"</td>"+
										"<td><a id='"+result.data[count-1].id+"'' onclick='requestEditArtikel("+result.data[count-1].id+")' class='glyphicon glyphicon-pencil'></a></td>"+
										//"<td><a id='"+result.data[count-1].id+"'' href='kelola/"+pindahEdit(result.data[count-1].id)+"' class='glyphicon glyphicon-pencil'></a></td>"+
										"<td><a class='glyphicon glyphicon-trash delete-artikel'></a>"+
										"</td></tr>"
										);
									});
									
								}else{
									$('.alert').append("<div class='alert alert-warning text-center' role='alert'><strong>"+ result.data[0].judul +"</strong>"+ result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
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
		}



	        
});

