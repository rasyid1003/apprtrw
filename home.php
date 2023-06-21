<?php
  include "inc/koneksi.php";
   
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sidak</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="assets\webutama/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="assets\webutama/css/animate.css">
    
    <link rel="stylesheet" href="assets\webutama/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets\webutama/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="assets\webutama/css/magnific-popup.css">

    <link rel="stylesheet" href="assets\webutama/css/aos.css">

    <link rel="stylesheet" href="assets\webutama/css/ionicons.min.css">

    <link rel="stylesheet" href="assets\webutama/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="assets\webutama/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="assets\webutama/css/flaticon.css">
    <link rel="stylesheet" href="assets\webutama/css/icomoon.css">
    <link rel="stylesheet" href="assets\webutama/css/style.css">
  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-dark" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Aplikasi Rt Rw</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	        	<li class="nav-item active"><a href="home.php" class="nav-link">Home</a></li>
	        	
                <li class="nav-item"><a href="#pengumuman" class="nav-link">Pengumuman</a></li>
	        	<li class="nav-item"><a href="#siskam" class="nav-link">Jadwal Siskamling</a></li>
                <li class="nav-item"><a href="#pendatang" class="nav-link">Pendatang</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
              <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
              <a href="login.php">
  <button type="button" class="btn btn-primary">login</button>
</a>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
    
    <section class="home-slider js-fullheight owl-carousel bg-white">
      <div class="slider-item js-fullheight">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end" data-scrollax-parent="true">
          	<div class="one-third order-md-last img js-fullheight" style="background-image:url(https://cdn.discordapp.com/attachments/1111680511266533547/1112647642409877574/gambar_3.jpg);">
          		<h3 class="vr">Tentang Kami</h3>
          	</div>
	          <div class="one-forth d-flex js-fullheight align-items-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
	          	<div class="text">
		            <h1 class="mb-4">Selamat Datang<br>Di Aplikasi Rt Rw</h1>
		            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, tenetur nesciunt? Dolorem nostrum tenetur repellat commodi iusto! Iusto aspernatur, suscipit sint dolorum distinctio aut modi repellendus illum voluptatem quo ipsum!</p>
		            
	            </div>
	          </div>
        	</div>
        </div>
      </div>

      
      <!-- memuncullkan Table  siskamling Berdasarkan database -->
    </section>
    <div id="siskam" class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table text-"></i> Jadwal siskamling</h3>

	</div>
	<table id="example1" class="table table-bordered table-striped">
	<thead>
		<tr>
			
			<th>Hari</th>
			<th>Nama</th>
			<th>Jaga</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1;
		$sql = $koneksi->query("SELECT p.id_pend, p.nik, p.nama, d.hari, d.jaga, d.id_siskam 
								FROM tb_siskam d 
								INNER JOIN tb_pdd p ON p.id_pend = d.id_pdd 
								ORDER BY d.hari"); // Mengurutkan data berdasarkan kolom "Hari"
		while ($data = $sql->fetch_assoc()) {
		?>
			<tr>
				
				<td><b><?php echo $data['hari']; ?></b></td>
				<td><?php echo $data['nama']; ?></td>
				<td><?php echo $data['jaga']; ?></td>
			</tr>
		<?php
		}
		?>
	</tbody>
	<tfoot>
		
	</tfoot>
</table>
<script>
	function printTable() {
		var printContents = document.getElementById("example1").outerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;
	}
</script>

<!-- Memmuncukan table pendatang berdasarka database -->
<div class="card card-info">
	<div class="card-header">
		<h3 class="card-title">
			<i class="fa fa-table"></i> Data Pendatang</h3>
	</div>
	<!-- /.card-header -->
	<div class="card-body">
		<div class="table-responsive">
			<br>
			<table id="example1" class="table table-bordered table-striped">
				<thead>
					<tr>
						
						<th>Nama</th>
						<th>Jekel</th>
						<th>Tanggal</th>
						<th>Pelapor</th>
					</tr>
				</thead>
				<tbody>

					<?php
              $no = 1;
			  $sql = $koneksi->query("SELECT d.id_datang, d.nik, d.nama_datang, d.jekel, d.tgl_datang, p.nama from 
			  tb_datang d inner join tb_pdd p on d.pelapor=p.id_pend");
              while ($data= $sql->fetch_assoc()) {
            	?>

					<tr>
						<td>
							<?php echo $data['nama_datang']; ?>
						</td>
						<td>
							<?php echo $data['jekel']; ?>
						</td>
						<td>
							<?php echo $data['tgl_datang']; ?>
						</td>
						<td>
							<?php echo $data['nama']; ?>
						</td>
					</tr>

					<?php
              }
            ?>
				</tbody>
				</tfoot>
			</table>
		</div>
	</div>

		
		<section id="about" class="ftco-section ftc-no-pb">
			<div class="container" >
				<div class="row no-gutters">
					<div class="col-md-5 p-md-5 img img-2" style="background-image: url(images/bg_3.jpg);">
					</div>
					<div class="col-md-7 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section mb-5 pl-md-5">
	          	<div class="pl-md-5 ml-md-5">
		          	<span class="subheading subheading-with-line"><small class="pr-2 bg-white">About</small></span>
		            <h2 class="mb-4">We are the best Interior, Exterior &amp; Architecture Firm</h2>
	            </div>
	          </div>
	          <div class="pl-md-5 ml-md-5 mb-5">
							<p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
							<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
							<p><a href="#" class="btn-custom">Learn More <span class="ion-ios-arrow-forward"></span></a></p>
						</div>
					</div>
				</div>
			</div>
		</section>

        


		

        <section id="pengumuman" class="ftco-section testimony-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate">
        <span class="subheading subheading-with-line"><small class="pr-2 bg-light">Pengumuman</small></span>
        <h2 class="mb-4">Pengumuman !</h2>
        <?php
        $no = 1;
        $sql = $koneksi->query("select * from tb_pengu");
        while ($data = $sql->fetch_assoc()) {
        ?>
          <div class="card mb-3">
            <div class="card-header"><h1><b><?php echo $data['judul']; ?></b></h1></div>
            <div class="card-body">
              <p class="card-text"><?php echo $data['isi']; ?></p>
              <p class="card-text"><?php echo $data['tanggal']; ?></p>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
</section>


    <footer class="ftco-footer ftco-bg-dark ftco-section">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>About</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Services</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Projects</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="assets\webutama/js/jquery.min.js"></script>
  <script src="assets\webutama/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets\webutama/js/popper.min.js"></script>
  <script src="assets\webutama/js/bootstrap.min.js"></script>
  <script src="assets\webutama/js/jquery.easing.1.3.js"></script>
  <script src="assets\webutama/js/jquery.waypoints.min.js"></script>
  <script src="assets\webutama/js/jquery.stellar.min.js"></script>
  <script src="assets\webutama/js/owl.carousel.min.js"></script>
  <script src="assets\webutama/js/jquery.magnific-popup.min.js"></script>
  <script src="assets\webutama/js/aos.js"></script>
  <script src="assets\webutama/js/jquery.animateNumber.min.js"></script>
  <script src="assets\webutama/js/bootstrap-datepicker.js"></script>
  <script src="assets\webutama/js/jquery.timepicker.min.js"></script>
  <script src="assets\webutama/js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="assets\webutama/js/google-map.js"></script>
  <script src="assets\webutama/js/main.js"></script>
    
  </body>
</html>