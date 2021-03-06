<h2 class="page-header">Tampil Produk</h2>
<a class="btn btn-primary" onclick="addForm()">Tambah Produk</a>
	<br><br>
	<!-- Membuat tabel /-->
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td width="25px">No</td>
				<td>Nama Produk</td>
				<td>Harga </td>
				<td>Aksi </td>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
	<!-- Membuat modal form /-->
	<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
	   <div class="modal-dialog modal-lg">
	      <div class="modal-content">

				<form class="form-horizontal" method="post" onsubmit="return saveData()">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"> &times; </span>
						</button>
						<h3 class="modal-title"></h3>
					</div>

					<div class="modal-body">
						<input type="hidden" name="id" id="id">

						<div class="form-group">
							<label class="control-label col-md-2">Nama Produk</label>
							<div class="col-md-4">
								<input type="text" name="nama" id="nama" class="form-control" required>
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-md-2">Harga</label>
							<div class="col-md-4">
								<input type="number" name="harga" id="harga" class="form-control" required>
							</div>
						</div>

					</div>

					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-save">Simpan</button>
						<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	var table, save_method;
	$(function(){
		table = $('.table').DataTable({
			"language" : {
				"lengthMenu" : "Menampilkan _MENU_ data per halaman",
				"zeroRecords" : "Data tidak ditemukan",
				"info" : "Menampilkan _PAGE_ dari _PAGES_ halaman",
				"infoEmpty" : "Tidak ada yang cocok",
				"infoFiltered" : "(menyortir dari _MAX_ total data)",
				"search" : "Arep nggolek opo rek? ",
				"paginate" : {
					"previous": "Sak Urunge",
					"next": "Teros"
				}
			},
			"processing" : true,
			"ajax" : {
				"url" : "<?= BASE_PATH ?>/produk/listData",
				"type" : "POST"
			}
		});
	});
	function addForm(){
		save_method = "add";
		$('#modal-form').modal('show');
		$('#modal-form form')[0].reset();
		$('.modal-title').text('Tambah Produk');
	}
	function editForm(id){
		save_method = "edit";
		$('#modal-form form')[0].reset();
		$.ajax({
			url : "<?= BASE_PATH ?>/produk/edit/"+id,
			type : "GET",
			dataType : "JSON",
			success: function(data){
				$('#modal-form').modal('show');
				$('.modal-title').text('Edit Produk');

				$('#id').val(data.id_produk);
				$('#nama').val(data.nama_produk);
				$('#harga').val(data.harga);
			},
			error : function(){
				alert("Tidak dapat menampilkan data!");
			}
		});
	}
	function saveData(){
		if(save_method =="add") url = "<?= BASE_PATH ?>/produk/insert";
		else url = "<?= BASE_PATH ?>/produk/update";
		$.ajax({
			url : url,
			type : "POST",
			data : $('#modal-form form').serialize(),
			success : function(data){
				$('#modal-form').modal('hide');
				table.ajax.reload();
					alert("Data berhasil disimpan!");
			},
			error : function(){
				alert("Tidak dapat menampilkan data!");
			}
		});
		return false;
	}
	function deleteData(id){
		if(confirm("Apakah yakin data akan dihapus?")){
			$.ajax({
				url: "<?= BASE_PATH ?>/produk/delete/"+id,
				type: "GET",
				success : function(data){
					table.ajax.reload();
					alert("Data berhasil dihapus!");
				},
				error : function(){
					alert("tidak dapat menghapus data!");
				}
			});
		}
	}
	</script>
