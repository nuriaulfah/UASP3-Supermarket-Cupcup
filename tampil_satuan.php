<?php
	include_once('koneksi.php');
	include_once('header.php');
	include_once('sidebar.php');
?>
	<main id="main" class="main">

<div class="pagetitle">
  <h1>Satuan Tables</h1>
  <nav>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	  <li class="breadcrumb-item">Tables</li>
	  <li class="breadcrumb-item active">Satuan</li>
	</ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
	<div class="col-lg-6">

	  <div class="card">
		<div class="card-body">
		  <h5 class="card-title">Satuan Table</h5>

		  <!-- Default Table -->
		  <table class="table">
			<thead>
			  <tr>
				<th scope="col">No</th>
				<th scope="col">Id Satuan</th>
				<th scope="col">Nama</th>
			  </tr>
			</thead>
			<?php
				$no = 1;
				$queryulfah = mysqli_query($koneksi,"SELECT * FROM satuan");
				while($data = mysqli_fetch_array($queryulfah))
				{
			?>
			<tbody>
			  <tr>
			  	<td><?php echo $no++;?></td>
				<td><?php echo $data['id_satuan']; ?></td>
				<td><?php echo $data['nama']; ?></td>
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