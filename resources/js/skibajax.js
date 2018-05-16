var baseUrl = window.location.protocol+"//"+window.location.host+"/"; // ambil base url
var path = window.location.pathname; // ambil path dari url

$(document).ready(function () {
	switch (path) {
		case "/skiba/admin/siswa":
			tableSiswa()
			break;
		case "/skiba/admin/guru":
			tableGuru()
			break;
		case "/skiba/admin/jurusan":
			requestData('skiba/admin/jurusan/tablejurusan','','#contentJurusan');
			break;
		case "/skiba/admin/kelas":
			requestData('skiba/admin/kelas/tablekelas','','#contentKelas');
			break;
		case "/skiba/admin/mapel":
			requestData('skiba/admin/mapel/tablemapel','','#contentMapel');
			break;
		default:
			// statements_def
			break;
	}
})
function requestData (url,data='',id='',datatipe) {
	$.ajax({
		url: baseUrl+url,
		type: "post",
		data: "id="+data,
		dataType: datatipe,
		beforeSend: function () {
			/* body... */
		},
		success: function (response) {
			$(id).html(response);
		}
	})
}
function submitData (form,success) {
	$(form).submit(function (e) {
		e.preventDefault();
		var data = $(this).serialize();
		var url = $(this).attr('action');
		$.ajax({
		url: url,
		type: "post",
		data: data,
		dataType: "json",
		beforeSend:function () {
			/* body... */
		},
		success: function (response) {
			swal("Success!", response.pesan, "success");
			var data = '';
			switch (success) {
				case "siswa":
					tableSiswa();
					break;
				case "guru":
					tableGuru();
					break;
				case "jurusan":
					requestData('skiba/admin/jurusan/tablejurusan','','#contentJurusan');
					break;
				case "kelas":
					requestData('skiba/admin/kelas/tablekelas','','#contentKelas');
					break;
				case "mapel":
					requestData('skiba/admin/mapel/tablemapel','','#contentMapel');
					break;
				default:
					
					break;
			}
		},
		error: function () {
			swal("Oops...", "Something went wrong :(", "error");
		}
	});
	});
}
$('#form').submit(function (e) {
	e.preventDefault();
	var url = $(this).attr('action');
	var data = $(this).serialize();
	var pathname = window.location.pathname;
	$.ajax({
		url: url,
		type: 'post',
		data: data,
		dataType: 'json',
		beforeSend: function () {
			/* body... */
		},
		success: function (response) {
			swal("Success!", response.pesan, "success");
			switch (pathname) {
				case '/skiba/admin/siswa':
					// statements_1
					break;
				case '/skiba/admin/guru':
					// statements_1
					break;
				case '/skiba/admin/jurusan':
					// statements_1
					break;
				case '/skiba/admin/kelas':
					// statements_1
					break;
				case '/skiba/admin/mapel':
					requestData('skiba/admin/mapel/tablemapel','','#contentMapel');
					break;
				case '/skiba/admin/jadwal':
					// statements_1
					break;
				case '/skiba/admin/jabatan':
					// statements_1
					break;
				default:
					// statements_def
					break;
			}
		},
		error: function () {
			swal("Oops...", "Something went wrong :(", "error");
		}

	});
});
// Siswa
function tableSiswa () {
	$.ajax({
		url: baseUrl+"skiba/admin/siswa/tablesiswa",
		type: "post",
		dataType: "html",
		beforeSend: function () {
			/* body... */
		},
		success: function (response) {
			$('#contentSiswa').html(response);
		}
	})
}
$('#formSiswa').submit(function (e) {
	e.preventDefault();
	console.log($(this).serialize());
	$.ajax({
		url: baseUrl+"skiba/admin/siswa/tambah",
		type: "post",
		data: $(this).serialize(),
		dataType:"json",
		beforeSend: function () {
			/* body... */
		},
		success: function (response) {
			swal("Success!", response.pesan, "success");
			tableSiswa();
		},
		error:function(response){
     		swal("Oops...", "Something went wrong :(", "error");
      	}
	})
})
function editSiswaById (id) {
	console.log(id)
	$.ajax({
		url: baseUrl+"skiba/admin/siswa/siswaedit",
		type: "post",
		data: "id="+id,
		dataType: "html",
		beforeSend: function () {
			/* body... */
		},
		success: function (response) {
			$('#contentEditSiswa').html(response);
		}
	})
}
function hapusSiswaById (id) {
	console.log(id)
	$.ajax({
		url: baseUrl+"skiba/admin/siswa/hapus",
		type: "post",
		data: "id="+id,
		dataType: "json",
		beforeSend: function () {
			/* body... */
		},
		success: function (response) {
			swal("Success!", response.pesan, "success");
			tableSiswa();
		}
	})
}

// Guru
function tableGuru () {
	$.ajax({
		url: baseUrl+"skiba/admin/guru/tableguru",
		type: "post",
		dataType: "html",
		beforeSend: function () {
			/* body... */
		},
		success: function (response) {
			$('#contentGuru').html(response);
		}
	})
}
$('#formGuru').submit(function (e) {
	e.preventDefault();
	var data = $(this).serialize();
	var url = baseUrl+"skiba/admin/guru/tambah";
	submitData(url,data,'guru');
})
function hapusById (id,url,success) {
	var conf =  confirm('Apakah anda akin ingin menghapus data ini ?');
	if (conf==true) {
		$.ajax({
		    url: baseUrl+url,
		    type: "POST",
		    data:"id="+id,
		    success: function () {
		        swal("Berhasil", "Data berhasil di hapus", "success");
		        switch (success) {
		        	case "siswa":
		        		tableSiswa();
		        		break;
	        		case "guru":
		        		tableGuru();
		        		break;
		        	case "jurusan":
						requestData('skiba/admin/jurusan/tablejurusan','','#contentJurusan');
						break;
					case "jurusan":
						requestData('skiba/admin/jurusan/tablekelas','','#contentKelas');
						break;
		        	default:
		        		// statements_def
		        		break;
		        }
		    },
		    error: function (xhr, ajaxOptions, thrownError) {
		        swal("Error deleting!", "Please try again", "error");
				}
		});
	} else {

	}
}
const main = document.getElementById('isiUtama');
main.addEventListener('submit',function (e) {
	if (e.target.className=='form') {
		e.preventDefault();
		var forms = document.querySelectorAll('.form');
		var url = e.target.getAttribute('action');
		for (var i=0; i <= forms.length; i++) {
			// if (forms[i].classList.contains('active')) {
			// 	forms.classList.remove('active');
			// }
			console.log(forms[i]);
		}
		e.target.classList.add('active');
		console.log($('.active').serialize());
		// var data = e.target.serialize();

		console.log(e.target);
		var pathname = window.location.pathname;
		// $.ajax({
		// 	url: url,
		// 	type: 'post',
		// 	data: data,
		// 	dataType: 'json',
		// 	beforeSend: function () {
		// 		/* body... */
		// 	},
		// 	success: function (response) {
		// 		swal("Success!", response.pesan, "success");
		// 		switch (pathname) {
		// 			case '/skiba/admin/siswa':
		// 				// statements_1
		// 				break;
		// 			case '/skiba/admin/guru':
		// 				// statements_1
		// 				break;
		// 			case '/skiba/admin/jurusan':
		// 				// statements_1
		// 				break;
		// 			case '/skiba/admin/kelas':
		// 				// statements_1
		// 				break;
		// 			case '/skiba/admin/mapel':
		// 				requestData('skiba/admin/mapel/tablemapel','','#contentMapel');
		// 				break;
		// 			case '/skiba/admin/jadwal':
		// 				// statements_1
		// 				break;
		// 			case '/skiba/admin/jabatan':
		// 				// statements_1
		// 				break;
		// 			default:
		// 				// statements_def
		// 				break;
		// 		}
		// 	},
		// 	error: function () {
		// 		swal("Oops...", "Something went wrong :(", "error");
		// 	}

		// });
	}
})
