<?php
	include_once('koneksi.php');
	include_once('header.php');
	include_once('sidebar.php');


	// menangkap data yang di kirim dari form
	if( !empty($_POST['save']) )
	{
		$nama = $_POST['nama'];
		$kategori_id = $_POST['kategori_id'];
		$satuan_id = $_POST['satuan_id'];
		// menginput data ke database
		$queryulfah=mysqli_query($koneksi,"insert into barang values('','$nama','$kategori_id','$satuan_id')");

		if($queryulfah)
		{
			//mengalihkan halaman kembali
			header("location:tampil_barang.php");
		}
		else
		{
			echo mysqli_error($koneksi);
		}
	}	

	$queryulfahkategori = "SELECT * FROM kategori";
	$satuan = "Select * from satuan";
	$resultsatuan = mysqli_query($koneksi, $satuan);
	$resultkategori = mysqli_query ($koneksi,$queryulfahkategori); 
?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Input Barang</h1>
  <nav>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	  <li class="breadcrumb-item">Forms</li>
	  <li class="breadcrumb-item active">Input Barang</li>
	</ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
	<div class="col-lg-6">

	  <div class="card">
		<div class="card-body">
		  <h5 class="card-title">General Form Input Barang</h5>

		  <!-- General Form Input Barang -->
		  <form method="POST">
			<div class="row mb-3">
			  <label for="inputText" class="col-sm-2 col-form-label">Nama Barang</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" name="nama">
			  </div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label">Kategori</label>
				<div class="col-sm-10">
				<select class="form-select" aria-label="Default select example"  name="kategori_id">
					<option value="">-----Pilih-----</option>
						<?php
							while ($datakategori=mysqli_fetch_array($resultkategori))
							{
								echo "<option value=$datakategori[id_kategori]>$datakategori[nama]</option>";
							}
						?>
				</select>
				</div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label">Satuan</label>
				<div class="col-sm-10">
				<select class="form-select" aria-label="Default select example"  name="satuan_id">
					<option value="">-----Pilih-----</option>
						<?php
							while ($datasatuan=mysqli_fetch_array($resultsatuan))
							{
								echo "<option value=$datasatuan[id_satuan]>$datasatuan[nama]</option>";
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

		  </form><!-- End General Form Input Barang -->

		</div>
	  </div>

	</div>
  </div>
</section>

</main><!-- End #main -->

<?php
	include_once('footer.php');
?>