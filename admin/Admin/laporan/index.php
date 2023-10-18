<?php

// koneksi
$conn = new mysqli('localhost', 'root', '', 'penjadwalan');

if (isset($_POST['cari'])) {
    $date1 = $_POST['bln'];
    $date2 = $_POST['thn'];
    $q = mysqli_query($conn, "select jadwal.*, jenis_kegiatan.id_kegiatan, jenis_kegiatan.nama_kegiatan
    from jadwal left join jenis_kegiatan on jadwal.id_kegiatan = jenis_kegiatan.id_kegiatan
    WHERE month(mulai) = '$date1' and year(mulai) = '$date2';");
} else {
    // perintah tampil semua data
    $q = mysqli_query($conn, "select jadwal.*, jenis_kegiatan.id_kegiatan, jenis_kegiatan.nama_kegiatan
        from jadwal inner join jenis_kegiatan on jadwal.id_kegiatan = jenis_kegiatan.id_kegiatan");
}

?>
<?php
$bulan_tes = array(
    '01' => "Januari",
    '02' => "Februari",
    '03' => "Maret",
    '04' => "April",
    '05' => "Mei",
    '06' => "Juni",
    '07' => "Juli",
    '08' => "Agustus",
    '09' => "September",
    '10' => "Oktober",
    '11' => "November",
    '12' => "Desember"
);
?>

<!-- <div class="flash-data" data-flashdata=""></div> -->
<div class="col-10 mx-auto">

<h3>
 					<!--<a  style="padding-left:2pc;" href="fungsi/hapus/hapus.php?laporan=jual" onclick="javascript:return confirm('Data Laporan akan di Hapus ?');">
								<button class="btn btn-danger">RESET</button>
							</a>-->
 					<?php if (!empty($_GET['cari'])) { ?>
 						Data Laporan Agenda <?= $bulan_tes[$_POST['bln']]; ?> <?= $_POST['thn']; ?>
 					<?php } elseif (!empty($_GET['hari'])) { ?>
 						Data Laporan Agenda <?= $_POST['hari']; ?>
 					<?php } else { ?>
 						Data Laporan Agenda <?= $bulan_tes[date('m')]; ?> <?= date('Y'); ?>
 					<?php } ?>
 				</h3>
 				<br />
 				<h4>Cari Laporan Per Bulan</h4>
 				<form method="post" action="<?= BASE_URL . 'admin/?page=laporan&cari=ok' ?>">
                 <table class="table table-striped table-bordered text-center" style="width:100%" id="request">

 						<tr>
 							<td>
 								<select name="bln" class="form-control">
 									<option selected="selected">Bulan</option>
 									<?php
										$bulan = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
										$jlh_bln = count($bulan);
										$bln1 = array('01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12');
										$no = 1;
										for ($c = 0; $c < $jlh_bln; $c += 1) {
											echo "<option value='$bln1[$c]'> $bulan[$c] </option>";
											$no++;
										}
										?>
 								</select>
 							</td>
 							<td>
 								<?php
									$now = date('Y');
									echo "<select name='thn' class='form-control'>";
									echo '
									<option selected="selected">Tahun</option>';
									for ($a = 2017; $a <= $now; $a++) {
										echo "<option value='$a'>$a</option>";
									}
									echo "</select>";
									?>
 							</td>
 							<td>
 								<input type="hidden" name="periode" value="ya">
 								<button class="btn btn-primary" name="cari">
 									<i class="fa fa-search"></i> Cari
 								</button>

 								<?php if (!empty($_GET['cari'])) { ?>
 									<a href="Admin/laporan/pdf.php?cari=yes&bln=<?= $_POST['bln']; ?>&thn=<?= $_POST['thn']; ?>" class="btn btn-info"><i class="fa fa-download"></i>
 										Download PDF</a>
 								<?php } else { ?>
 									<a href="Admin/laporan/pdf.php" class="btn btn-info"><i class="fa fa-download"></i>
 										Download PDF</a>
 								<?php } ?>
 							</td>
 						</tr>
 					</table>
 				</form>


    <div class="card card-accent-primary">
        <div class="card-header"><strong>Daftar Agenda</strong></div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered text-center" style="width:100%" id="request">
                <thead>
 								<tr style="background:#DFF0D8;color:#333;">
 									<th>No.</th>
 									<th>Mulai</th>
 									<th>Selesai</th>
 									
 									<th>Jenis Kegiatan</th>
 									<th>Nama Agenda/Kegiatan</th>
 									<th>Lokasi</th>
 									<th>Deskrispi</th>
 									<th>Instansi Permohonan/Pengundang</th>
 									<th>Jenis Permohonan</th>
 									<th>Status</th>
 									<th>PIC</th>
 								</tr>
 							</thead>
 							<tbody>

 								<?php
									$no = 1;
									while ($isi = $q->fetch_assoc()) {
									?>
 									<tr>
 										<td><?= $no++ ?></td>
 										<td><?= $isi['mulai']; ?></td>
 										<td><?= $isi['selesai']; ?></td>
 								
 										<td><?= $isi['nama_kegiatan']; ?></td>
 										<td><?= $isi['judul_kegiatan']; ?></td>
 										<td><?= $isi['lokasi']; ?></td>
 										<td><?= $isi['deskripsi']; ?></td>
 										<td><?= $isi['instansi']; ?></td>
 										<td><?= $isi['jenis_permohonan']; ?></td>
 										<td><?= $isi['stat']; ?></td>
 										<td><?= $isi['pic']; ?></td>

 									<?php $no++;
									} ?>
 							</tbody>
                </table>
            </div>
        </div>
    </div>
</div>