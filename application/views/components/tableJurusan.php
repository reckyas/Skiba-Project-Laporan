<table class="data-table stripe hover nowrap">
				<thead>
					<th>No</th>
					<th>Jurusan</th>
					<th>Kode Jurusan</th>
					<th>Keterangan</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php $i= 1; foreach ($tb_jurusan as $jurusan): ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $jurusan->jurusan_nama; ?></td>
							<td><?php echo $jurusan->jurusan_kode; ?></td>
							<td><?php echo $jurusan->jurusan_keterangan; ?></td>
							<td>
								<button class="btn btn-warning" onclick="requestData('skiba/admin/jurusan/editjurusan',<?php echo $jurusan->jurusan_id; ?>,'#contentEditJurusan','html')" data-toggle="modal" data-target="#editJurusan"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger" onclick="hapusById(<?php echo $jurusan->jurusan_id; ?>,'skiba/admin/jurusan/hapus','jurusan')"><i class="fa fa-trash"></i></button>
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