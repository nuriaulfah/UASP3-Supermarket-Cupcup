<?php
	include_once('koneksi.php');
	include_once('header.php');
	include_once('sidebar.php');


	// menangkap data yang di kirim dari form
	if( !empty($_POST['save']) )
	{
		$nama_pelanggan = $_POST['nama_pelanggan'];
		$no_tlp = $_POST['no_tlp'];
		$status = $_POST['status'];
		// menginput data ke database
		$queryulfah=mysqli_query($koneksi,"insert into pelanggan values('','$nama_pelanggan','$no_tlp','$status')");

		if($queryulfah)
		{
			// mengalihkan halaman kembali
			header("location:tampil_pelanggan.php");
		}
		else
		{
			echo mysqli_error($koneksi);
		}
	}	
?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Input Pelanggan</h1>
  <nav>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	  <li class="breadcrumb-item">Forms</li>
	  <li class="breadcrumb-item active">Input Pelanggan</li>
	</ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
	<div class="col-lg-6">

	  <div class="card">
		<div class="card-body">
		  <h5 class="card-title">General Form Input Pelanggan</h5>

		  <!-- General Form Input Pelanggan -->
		  <form method="POST">
		  <form>
			<div class="row mb-3">
			  <label for="inputText" class="col-sm-2 col-form-label">Nama Pelanggan</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" name="nama_pelanggan">
			  </div>
			</div>
			<div class="row mb-3">
			  <label for="inputText" class="col-sm-2 col-form-label">No Telpon</label>
			  <div class="col-sm-10">
				<input type="text" class="form-control" name="no_tlp">
			  </div>
			</div>
			<div class="row mb-3">
				<label class="col-sm-2 col-form-label">Status</label>
				<div class="col-sm-10">
					<select name="status" class="form-select" aria-label="Default select example">
						<option value="">-----Pilih</option>
						<option value="Member">Member</option>
						<option value="Non Member">Non Member</option>
					</select>
				</div>
			</div>
			<div class="row mb-3">
			  <label class="col-sm-2 col-form-label">Submit Button</label>
			  <div class="col-sm-10">
				<input type="submit" class="btn btn-primary" name="save">Submit Form</button>
			  </div>
			</div>

		  </form><!-- End General Form Input Pelanggan -->

		</div>
	  </div>

	</div>
  </div>
</section>

</main><!-- End #main -->

<?php
	include_once('footer.php');
?>