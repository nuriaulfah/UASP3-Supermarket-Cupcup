<?php
	include_once('koneksi.php');
	include_once('header.php');
	include_once('sidebar.php');
?>
	<main id="main" class="main">

<div class="pagetitle">
  <h1>Barang Tables</h1>
  <nav>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	  <li class="breadcrumb-item">Tables</li>
	  <li class="breadcrumb-item active">Barang</li>
	</ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
	<div class="col-lg-6">

	  <div class="card">
		<div class="card-body">
		  <h5 class="card-title">Default Table</h5>

		  <!-- Default Table -->
		  <table class="table">
			<thead>
			  <tr>
				<th scope="col">No</th>
				<th scope="col">Id Barang</th>
				<th scope="col">Nama</th>
				<th scope="col">Kategori</th>
				<th scope="col">Satuan</th>
			  </tr>
			</thead>
			<?php
				$no = 1;
				$queryulfah = mysqli_query($koneksi,"SELECT barang.id_barang, barang.nama_barang, kategori.id_kategori, kategori.nama as nama_kategori, satuan.id_satuan, satuan.nama as nama_satuan FROM barang LEFT JOIN kategori on barang.kategori_id = kategori.id_kategori LEFT JOIN satuan ON barang.satuan_id = satuan.id_satuan;");
				while($data = mysqli_fetch_array($queryulfah))
				{
			?>
			<tbody>
			  <tr>
			  	<td><?php echo $no++;?></td>
				<td><?php echo $data['id_barang']; ?></td>
				<td><?php echo $data['nama_barang']; ?></td>
				<td><?php echo $data['nama_kategori']; ?></td>
				<td><?php echo $data['nama_satuan']; ?></td>
				<td>
			  </tr>
			</tbody>
			<?php
				}
			?>
		  </table>
		  <!-- End Default Table Example -->
		</div>
	  </div>
	  </div>
	</div>
  </div>
</section>

</main><!-- End #main -->

<?php
		include_once('footer.php');
?>