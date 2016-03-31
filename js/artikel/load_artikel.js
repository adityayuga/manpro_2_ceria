$(document).ready(function(){

	 			requestLoadArtikel();
// 	//            jika dipilih, artikel akan masuk ke input dan modal di tutup
// 			requestLoadArtikel();
//             $(document).on('click', '.pilih', function (e) {
//                 document.getElementById("artikel").value = $(this).attr('data-artikel');
                
//             });
            

// //            tabel lookup mu
//             $(function () {
//                 $("#lookup").dataTable();
//             });

//             function dummy() {
//                 var artikel = document.getElementById("artikel").value;
//                 alert('Nomor Induk Mahasiswa ' + artikel + ' berhasil tersimpan');
                
//                 var ket = document.getElementById("ket").value;
//                 alert('Keterangan ' + ket + ' berhasil tersimpan');
//             }
            function requestLoadArtikel(){
            		$.ajax({
						type:"GET",
						dataType: "json",
						url: "kelola_artikel",
						success: function(result){
							if(result){
								$('.alerts').html("");
								if(result.error_code==0){
									var count = 0;
									$.each( result.data, function() {
									
									var date = new Date ( result.data[count].created_at );
									var weekdays = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];

									var weekday = weekdays[date.getDay()];
									var tgl = date.getDate();
									var bulan = date.getMonth()+1;
									var tahun = date.getFullYear();

										$('tbody').append(
										"<tr class='edan-"+count+"'><th>"+result.data[count].id+"</th> <th >"+result.data[count].judul+"</th><th >"+ weekday +" , "+ tgl + "/" + bulan+ "/" +tahun+"</th><th><a href='' class='glyphicon glyphicon-pencil'></a></th><th><a href='' class='glyphicon glyphicon-trash'></a></th></tr>"
										);
									  count +=1;
									});
									
								}else{
									$('.alerts').append("<div class='alert alert-warning text-center' role='alert'><strong>"+ result.data[0].judul +"</strong>"+ result.message +"</div>").fadeIn(200).fadeToggle(10000).fadeOut(50);
								}
							}
						},
						error : function(jqXhr) {
					        var errors = jqXhr.responseJSON; 
					        console.log(jqXhr);

					        errorsHtml = "<div class='alert alert-warning text-center' role='alert'>";

					        $.each( errors , function( key, value ) {
					            errorsHtml +=  value[0] ; 
					            console.log(value[0]);
					        });

					        errorsHtml += "</div>";
					  
							$('.alerts').html("");
					        $('.alerts').append(errorsHtml).fadeIn(200).fadeToggle(10000).fadeOut(50);
					    }
					}, "json");
		}
	        
});