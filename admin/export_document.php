<?php
include('config.php');  // koneksi ke database ada pada file conn.php
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=Report_Internal.xls");
?>

<!-- Buat Menu Table saat di Export Ke Excel-->
<center><h2>Rekap Dokumen Internal</h2></center>
<table border='1'>
<h3>
<thead><tr>
<td width=150>Judul Dokumen</td>
<td width=100>Jenis Dokumen</td>
<td width=180>Kode</td>
<td width="180">Berlaku Efektif</td>
<td width=150>Revisi Ke-</td>
<td width=150>Catatan</td>
<td width=150>Status</td>
</tr></thead>
<h3><tbody>

<!--Memanggil data dari tabel -->
<?php

if(isset($_POST['export'])){
	$dari=$_POST['dari'];
    $sampai=$_POST['sampai'];

    $query = mysql_query("SELECT
    tb_jenis_dokumen.jenis_dokumen,
    tb_dokumen_baru.id_dokumen,
    tb_dokumen_baru.entry_date,
    tb_dokumen_baru.kode,
    tb_dokumen_baru.nama_dokumen,
    tb_dokumen_baru.catatan,
    tb_dokumen_baru.keterangan,
    tb_dokumen_baru.revisi,
    tb_dokumen_baru.`file`,
    status_dokumen.status_dokumen,
    unit.unit
    FROM
    tb_dokumen_baru
    Inner Join tb_admin ON tb_dokumen_baru.id_admin = tb_admin.id_admin
    Inner Join status_dokumen ON status_dokumen.id_status_dokumen = tb_dokumen_baru.`status`
    Inner Join tb_jenis_dokumen ON tb_jenis_dokumen.id_jenis_dokumen = tb_dokumen_baru.jenis_dokumen
    Inner Join unit ON tb_admin.unit = unit.id_unit
    where 
        tb_dokumen_baru.entry_date Between '$dari' AND '$sampai'
    ");
}
while($data=mysql_fetch_array($query)){
?>

<!--
Menampilkan Data dari Tabel Seniman-->
<tr>
    <td align="center"><?php echo $data['nama_dokumen']; ?></td>
    <td align="center"><?php echo $data['jenis_dokumen']; ?></td>
    <td align="center"><?php echo $data['kode']; ?></td>
    <td align="center"><?php echo $data['entry_date']; ?></td>
    <td align="center"><?php echo $data['revisi']; ?></td>
    <td align="center"><?php echo $data['catatan']; ?></td>
    <td align="center"><?php echo $data['status_dokumen']; ?></td>
    

    </tr>

<!--Penutup--> 
<?php
}?>
</tbody></h3></table>

