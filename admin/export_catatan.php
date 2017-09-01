<?php
include('config.php');  // koneksi ke database ada pada file conn.php
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=Report_CM.xls");
?>

<!-- Buat Menu Table saat di Export Ke Excel-->
<center><h2>Rekap Catatan Mutu</h2></center>
<table border='1'>
<h3>
<thead><tr>
<td width=52>Judul</td>
<td width=150>Status</td>
<td width=180>Masa Berlaku</td>
<td width=150>Lokasi Simpan</td>
<td width=150>Metode</td>
<td width="150">Penanggung Jawab</td>
<td width="150">Tanggal</td>
</tr></thead>
<h3><tbody>

<!--Memanggil data dari tabel seniman-->
<?php


if(isset($_POST['export'])){
	$dari=$_POST['dari'];
	$sampai=$_POST['sampai'];
$query = mysql_query("SELECT
				catatan_mutu.judul,
				catatan_mutu.id_catatan,
				catatan_mutu.entry_date,
				status_cm.status_cm,
				catatan_mutu.masa_berlaku,
				catatan_mutu.lokasi_simpan,
				catatan_mutu.keterangan,
				catatan_mutu.`file`,
				metode.metode,
				tb_admin.nama_admin
				FROM
				tb_admin
				Inner Join catatan_mutu ON tb_admin.id_admin = catatan_mutu.id_admin
				Inner Join status_cm ON catatan_mutu.status_cm = status_cm.id_status_cm
				Inner Join metode ON catatan_mutu.id_metode = metode.id_metode
				where catatan_mutu.entry_date Between '$dari' AND '$sampai'
                    ");
}
while($data=mysql_fetch_array($query)){
?>

<!--Menampilkan Data dari Tabel Seniman-->
<tr>
    <td align="center"><?php echo $data['judul']; ?></td>
    <td align="center"><?php echo $data['status_cm']; ?></td>
    <td align="center"><?php echo $data['masa_berlaku']; ?></td>
    <td align="center"><?php echo $data['lokasi_simpan']; ?></td>
    <td align="center"><?php echo $data['metode']; ?></td>
    <td align="center"><?php echo $data['nama_admin'];?></td>
    <td align="center"><?php echo $data['entry_date'];?></td>
    </tr>

<!--Penutup--> 
<?php
}?>
</tbody></h3></table>