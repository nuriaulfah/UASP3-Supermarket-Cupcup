<?php
	include_once('koneksi.php');
	include_once('header.php');
	include_once('sidebar.php');


	// menangkap data yang di kirim dari form
	if( !empty($_POST['save']) )
	{
		$nama_transaksi = $_POST['nama_transaksi'];
		$tgl_transaksi = $_POST['tgl_transaksi'];
		$harga = $_POST['harga'];
		$qty = $_POST['qty'];
		$id_barang = $_POST['id_barang'];
		$diskon= $_POST['diskon'];
		$id_pelanggan = $_POST['id_pelanggan'];

		// menginput data ke database
		$queryulfah=mysqli_query($koneksi,"insert into transaksi values('','$nama_transaksi','$tgl_transaksi','$harga','$qty','$id_barang','$diskon','$id_pelanggan')");

		if($queryulfah)
		{
			//mengalihkan halaman kembali
			header("location:tampil_transaksi.php");
		}
		else
		{
			echo mysqli_error($koneksi);
		}
	}	

	$barang = "Select * from barang";
	$resultbarang = mysqli_query($koneksi, $barang);
	$pelanggan = "Select * from pelanggan";
	$resultpelanggan = mysqli_query($koneksi, $pelanggan);
?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Input Transaksi</h1>
  <nav>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	  <li class="breadcrumb-item">Forms</li>
	  <li class="breadcrumb-item active">Input Transaksi</li>
	</ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
	<div class="col-lg-6">

	  <div class="card">
		<div class="card-body">
		  <h5 class="card-title">General Form Input Transaksi</h5>

		  <!-- General Form Input Transaksi -->
		  <form method="POST">
			<div class="row mb-3">
			  <label for="inputText" class="col-sm-2 col-form-label">Nama Transaksi</label>
			  <div class="col-sm-10">
			  		<select class="form-select" aria-label="Default select example"  name="nama_transaksi">
			  			<option value="">-----Pilih-----</option>
						<option value="1">-----Pelanggan-----</option>
						<option value="2">-----Pembelian-----</option>
					</select>
			  </div>
			</div>
			<div class="row mb-3">
			  <label for="inputText" class="col-sm-2 col-form-label">tanggal Transaksi</label>
			  	<div class="col-sm-10">
					<input type="text" class="form-control" name="tgl_transaksi">
				</div>
			</div>
			<div class="row mb-3">
			  <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
			  <div class="col-sm-10">
					<input type="text" class="form-control" name="harga">
			  </div>
			</div>
			<div class="row mb-3">
			  <label for="inputText" class="col-sm-2 col-form-label">Qty</label>
			  <div class="col-sm-10">
					<input type="text" class="form-control" name="qty">
			  </div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label">id_barang</label>
				<div class="col-sm-10">
				<select class="form-select" aria-label="Default select example"  name="id_barang">
					<option value="">-----Pilih-----</option>
					<?php
					while ($databarang=mysqli_fetch_array($resultbarang))
					{
						echo "<option value=$databarang[id_barang]>$databarang[nama_barang]</option>";
					}
					?>
						
				</select>
			</div>
			</div>
			<div class="row mb-3">
			  <label for="inputText" class="col-sm-2 col-form-label">Diskon</label>
			  <div class="col-sm-10">
					<input type="text" class="form-control" name="diskon">
			  </div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label">id_pelanggan</label>
				<div class="col-sm-10">
					<select name="id_pelanggan" class="form-select" aria-label="Default select example">
						<option value="">-----Pilih-----</option>
						<?php
						while ($datapelanggan=mysqli_fetch_array($resultpelanggan))
						{
							echo "<option value=$datapelanggan[id_pelanggan]>$datapelanggan[nama_pelanggan]</option>";
						}
						?>
					</select>
				</div>
			</div>
			<div class="row mb-3">
			  <label class="col-sm-2 col-form-label">Submit Button</label>
			  <div class="col-sm-10">
				<input type="submit" class="btn btn-primary" name="save">Submit Form</button>
			  </div>
			</div>

		  </form><!-- End General Form Input Transaksi -->

		</div>
	  </div>

	</div>
  </div>
</section>

</main><!-- End #main -->

<?php
	include_once('footer.php');
?>