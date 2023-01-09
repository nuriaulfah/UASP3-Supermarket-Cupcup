<?php
	include_once('koneksi.php');
	include_once('header.php');
	include_once('sidebar.php');
?>
	<main id="main" class="main">

<div class="pagetitle">
  <h1>Pelanggan Tables</h1>
  <nav>
	<ol class="breadcrumb">
	  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
	  <li class="breadcrumb-item">Tables</li>
	  <li class="breadcrumb-item active">Pelanggan</li>
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
				<th scope="col">Id Pelanggan</th>
				<th scope="col">Nama Pelanggan</th>
				<th scope="col">No Telpon</th>
				<th scope="col">Status</th>
			  </tr>
			</thead>
			<?php
				$no = 1;
				$queryulfah = mysqli_query($koneksi,"SELECT * FROM pelanggan");
				while($data = mysqli_fetch_array($queryulfah))
				{
			?>
			<tbody>
			  <tr>
			  	<td><?php echo $no++;?></td>
				<td><?php echo $data['id_pelanggan']; ?></td>
				<td><?php echo $data['nama_pelanggan']; ?></td>
				<td><?php echo $data['no_tlp']; ?></td>
				<td><?php echo $data['status']; ?></td>
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