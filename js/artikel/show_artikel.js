$(document).ready(function(){

		

            		$.ajax({
						type:"GET",
						dataType: "json",
						url: "show_artikel",
						success: function(result){
							if(result){ 
								$('.post-preview').html("");
								if(result.error_code==0){
									var count = 0;
									$.each( result.data, function() {
									
									var date = new Date ( result.data[count].created_at );
									var weekdays = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

									var weekday = weekdays[date.getDay()];
									var tgl = date.getDate();
									var bulan = date.getMonth()+1;
									var tahun = date.getFullYear();
									console.log(result.data[count].judul);
									count +=1;
										$('.post-preview').append(
										'<a onclick="showSelfHelp('+result.data[count-1].id+')">'+
					                        '<h2 class="post-title">'+result.data[count-1].judul+'</h2>'+
					                        '<h3 class="post-subtitle">'+result.data[count-1].content+'</h3>'+
					                    '</a>'+
					                    '<p class="post-meta">SelfHelp...<!-- kategori artikel dari database-->"'+weekday +" , "+ tgl + "/" + bulan+ "/" +tahun+'"</p>'
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



	        
});

function showSelfHelp(id){
	$.ajax({
	                url: 'show-{id}',
	                type: 'GET',
	                data: { id: id },
	                success: function(response)
	                {
							if(result){ 
								$('.post-preview').html("");
								if(result.error_code==0){
									var count = 0;
									alert(result.data[0].id);
									}
								}
						
	                }
	            });
}