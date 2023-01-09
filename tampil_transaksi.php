<?php
	include_once('koneksi.php');
	include_once('header.php');
	include_once('sidebar.php');
?>
	<main id="main" class="main">

<div class="pagetitle">
  <h1>Transaksi Tables</h1>
  <nav>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	  <li class="breadcrumb-item">Tables</li>
	  <li class="breadcrumb-item active">Transaksi</li>
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
				<th scope="col">Pelanggan</th>
				<th scope="col">Status</th>
				<th scope="col">Kategori</th>
				<th scope="col">Barang</th>
				<th scope="col">Qty</th>
				<th scope="col">Harga</th>
				<th scope="col">Diskon</th>
				<th scope="col">Total</th>
			  </tr>
			</thead>
			<?php
				$no = 1;
				$queryulfah = mysqli_query($koneksi,"select p.nama_pelanggan as Nama_Pelanggan, p.status, k.nama as NamaKategori, b.nama_barang, t.qty, t.harga, t.diskon, (t.harga-((t.diskon/100)*t.qty*t.harga)) as total  from transaksi t LEFT JOIN pelanggan p on t.id_pelanggan = p.id_pelanggan LEFT JOIN barang b on b.id_barang=t.id_barang LEFT JOIN kategori k on b.kategori_id = k.id_kategori;");
				while($data = mysqli_fetch_array($queryulfah))
				{
			?>
			<tbody>
			  <tr>
			  	<td><?php echo $no++;?></td>
				<td><?php echo $data['Nama_Pelanggan']; ?></td>
				<td><?php echo $data['status']; ?></td>
				<td><?php echo $data['NamaKategori']; ?></td>
				<td><?php echo $data['nama_barang']; ?></td>
				<td><?php echo $data['qty']; ?></td>
				<td><?php echo $data['harga']; ?></td>
				<td><?php echo $data['diskon']; ?></td>
				<td><?php echo $data['total']; ?></td>
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