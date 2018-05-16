<table class="data-table stripe hover nowrap">
				<thead>
					<th>No</th>
					<th>Mapel</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php $i= 1; foreach ($tb_mapel as $mapel): ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td><?php echo $mapel->mapel_nama; ?></td>
							<td>
								<button class="btn btn-warning" onclick="requestData('skiba/admin/mapel/editmapel',<?php echo $mapel->mapel_id; ?>,'#contentEditMapel','html')" data-toggle="modal" data-target="#editMapel"><i class="fa fa-edit"></i></button>
								<button class="btn btn-danger" onclick="hapusById(<?php echo $mapel->mapel_id; ?>,'skiba/admin/mapel/hapus','mapel')"><i class="fa fa-trash"></i></button>
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