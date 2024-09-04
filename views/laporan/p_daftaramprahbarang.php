<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" href="<?= base_url() ?>src/css/laporan.css">

	<title>Data Amprah Barang</title>
</head>

<body>
	<!-- <meta http-equiv="REFRESH" content="5; url=<?= base_url('laporan/aset') ?>"> -->
	<div class="container">
		<div class="row pt-4">
			<div class="col-md-10 text-center">
				<img src="<?= base_url() ?>src/img/logo/Lambang_kota_prabumulih.png" class="kiri" alt="">
				<h2>PEMERINTAH KOTA PRABUMULIH</h2>
				<h3>RUMAH SAKIT UMUM DAERAH KOTA PRABUMULIH</h3>
				<p>Jln. Lingkar Kel. Gunung Ibul Prabumulih Timur 31111 Telp (0713)3300402/ (0713)3300404 <br>
					<strong>e-mail:rsudkotaprabumulih2@gmail.com</strong>
				</p>
				<!-- <h2>Prabumulih</h2> -->
			</div>
		</div>
		<hr style="border: 1px solid black;">
		<div class="row">
			<div class="col text-center">
				<strong>Form Amprah Barang</strong>
			</div>
		</div>
		<div class="row pt-3">
			<div class="col text-center">
				<table class="table table-bordered">
					<thead>
						<th>NO.</th>
						<th>KD AMPRAH</th>
						<th>TANGGAL PERMINTAAN</th>
						<th>NAMA</th>
						<th>RUANG</th>
						<th>KD BARANG (Rp.)</th>
						<th>NAMA BARANG</th>
						<th>JUMLAH</th>
						<th>NAMA SATUAN</th>
						<th>NAMA KATEGORI</th>
					</thead>
					<tbody>
						<?php
						$sum = 0;
						$no = 1;
						foreach ($detailpermintaan as $row) :
							$sum += $row['jumlah'];
						?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= $row['kd_amprah'] ?></td>
								<td><?= $row['tgl_permintaan'] ?></td>
								<td><?= $row['nama'] ?></td>
								<td><?= $row['ruang'] ?></td>
								<td><?= $row['kd_barang'] ?></td>
								<td><?= $row['nama_barang'] ?></td>
								<td><?= $row['jumlah'] ?></td>
								<td><?= $row['nama_satuan'] ?></td>
								<td><?= $row['nama_kategori'] ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="7"><b>Jumlah</b></td>
							<td><?= $sum; ?></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				Mengetahui, <br>
				Kasubag Umum Tata Usaha dan Rumah Tangga <br>
				<img class="card-img-top" src="<?php echo base_url() . 'src/img/qrcode/ttd_kasubag.png'; ?>" alt="Card image cap" style="height:150px;width:150px;"><br>

				Yudi Herlison, AM.Kep., SKM</br>
				NIP.197907272006041019
			</div>
			<div class="col text-right">
				Prabumulih, <?= tgl_indo(date('Y-m-d')) ?><br>
				Yang Mengajukan <br>
				<img src="<?= base_url() ?>src/img/qrcode/<?= $this->session->userdata('nama_user') . '.png'; ?>" style="height:150px;width:150px;">

				<br />

				<?= $this->session->userdata('nama_user'); ?></br>
				NIP. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			</div>
		</div>
		<div class="row pt-12">
			<div class="col text-center">
				Mengetahui, <br>
				Kabag Umum dan Sumber Daya Manusia <br>
				<img class="card-img-top" src="<?php echo base_url() . 'src/img/qrcode/ttd_kabag.png'; ?>" alt="Card image cap" style="height:150px;width:150px;"><br>

				Ns. Adi Kuanto., S.Kep., MARS</br>
				NIP.197907272006041019
			</div>
		</div>

		<script>
			window.print();
		</script>


		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>