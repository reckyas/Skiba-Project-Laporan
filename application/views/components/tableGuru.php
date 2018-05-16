<table class="data-table stripe hover nowrap">
				<thead>
					<th>No</th>
					<th>NIP</th>
					<th>Nama</th>
					<th>TL</th>
					<th>Alamat</th>
					<th>Mapel</th>
					<th>Jabatan</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php $i= 1; foreach ($tb_guru->result() as $guru): ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $guru->guru_nip; ?></td>
							<td><?php echo $guru->guru_nama; ?></td>
							<td><?php echo $guru->guru_tl ?></td>
							<td><?php echo $guru->guru_alamat; ?></td>
							<td><?php echo $guru->mapel_nama; ?></td>
							<td><?php echo $guru->jabatan_nama; ?></td>
							<td>
								<button class="btn btn-warning" onclick="requestData('skiba/admin/guru/guruedit',<?php echo $guru->guru_id; ?>,'#contentEditGuru','html')" data-toggle="modal" data-target="#editGuru"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger" onclick="hapusById(<?php echo $guru->guru_id; ?>,'skiba/admin/guru/hapus','guru')"><i class="fa fa-trash"></i></button>
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