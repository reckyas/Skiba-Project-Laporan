<table class="data-table stripe hover nowrap">
				<thead>
					<th>No</th>
					<th>NIS</th>
					<th>Nama</th>
					<th>TL</th>
					<th>JL</th>
					<th>Alamat</th>
					<th>Jurusan</th>
					<th>Kelas</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php $i= 1; foreach ($data->result() as $siswa): ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $siswa->siswa_nis; ?></td>
							<td><?php echo $siswa->siswa_nama; ?></td>
							<td><?php echo $siswa->siswa_tl ?></td>
							<td><?php echo $siswa->siswa_jk = ($siswa->siswa_jk=="L") ? "Laki-laki" : "Perempuan" ; ?></td>
							<td><?php echo $siswa->siswa_alamat; ?></td>
							<td><?php echo $siswa->jurusan_nama; ?></td>
							<td><?php echo $siswa->kelas_nama; ?></td>
							<td>
								<button class="btn btn-warning" onclick="requestData('skiba/admin/siswa/editsiswa',<?php echo $siswa->siswa_id; ?>,'#contentEditSiswa','html')" data-toggle="modal" data-target="#editSiswa"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger" onclick="hapusById(<?php echo $siswa->siswa_id; ?>,'skiba/admin/siswa/hapus','siswa')"><i class="fa fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
			<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
			$('.data-table-export').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
				dom: 'Bfrtip',
				buttons: [
				'copy', 'csv', 'pdf', 'print'
				]
			});
			var table = $('.select-row').DataTable();
			$('.select-row tbody').on('click', 'tr', function () {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
				}
				else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
				}
			});
			var multipletable = $('.multiple-select-row').DataTable();
			$('.multiple-select-row tbody').on('click', 'tr', function () {
				$(this).toggleClass('selected');
			});
		});
	</script>