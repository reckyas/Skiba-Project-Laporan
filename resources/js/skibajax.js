// Cofigurasi awal
var baseUrl = window.location.protocol+"//"+window.location.host+"/"; // ambil base url
var path = window.location.pathname; // ambil path dari url
const main = document.getElementById('isiUtama'); // Mengambil parent pembungkus utama berdasarkan id
const forms = document.querySelectorAll('.form'); // mengambil semua form berdasarkan class
// Statment request data tabel untuk masing2 modul
$(document).ready(function () {
	switch (path) {
		case "/skiba/admin/siswa":
			requestData('skiba/admin/siswa/tablesiswa','','#contentSiswa');
			break;
		case "/skiba/admin/guru":
			requestData('skiba/admin/guru/tableguru','','#contentGuru');
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
		case "/skiba/admin/jabatan":
			requestData('skiba/admin/jabatan/tablejabatan','','#contentJabatan');
			break;
		default:
			// statements_def
			break;
	}
})
// fungsi request data
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
// statment untuk push/memasukan data
main.addEventListener('submit',function (e) {
	if (e.target.classList.contains('form')==true) {
		e.preventDefault();
		var url = e.target.getAttribute('action');
		console.log(url)
		forms.forEach( function(form) {
			form.className="form";
		});
		e.target.classList.add('activeForm');
		var data = $('.activeForm').serialize();
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
						requestData('skiba/admin/siswa/tablesiswa','','#contentSiswa');
						break;
					case '/skiba/admin/guru':
						requestData('skiba/admin/guru/tableguru','','#contentGuru');
						break;
					case '/skiba/admin/jurusan':
						requestData('skiba/admin/jurusan/tablejurusan','','#contentJurusan');
						break;
					case '/skiba/admin/kelas':
						requestData('skiba/admin/kelas/tablekelas','','#contentKelas');
						break;
					case '/skiba/admin/mapel':
						requestData('skiba/admin/mapel/tablemapel','','#contentMapel');
						break;
					case '/skiba/admin/jadwal':
						requestData('skiba/admin/jadwal/tablejadwal','','#contentJadwal');
						break;
					case '/skiba/admin/jabatan':
						requestData('skiba/admin/jabatan/tablejabatan','','#contentJabatan');
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
	}
})
// fungsi hapus hapus berdasarkan id
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
		        		requestData('skiba/admin/siswa/tablesiswa','','#contentSiswa');
		        		break;
	        		case "guru":
		        		requestData('skiba/admin/guru/tableguru','','#contentGuru');
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
					case "jabatan":
						requestData('skiba/admin/jabatan/tablejabatan','','#contentJabatan');
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