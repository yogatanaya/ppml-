<?php
include('config.php');  // koneksi ke database ada pada file conn.php
header("Content-Type: application/force-download");
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT");
header("content-disposition: attachment;filename=Report_Peraturan.xls");
?>

<!-- Buat Menu Table saat di Export Ke Excel-->
<center><h2>Rekap Peraturan</h2></center>
<table border='1'>
<h3>
<thead><tr>
<td width=52>Nomor</td>
<td width=150>Judul</td>
<td width=180>Tahun</td>
<td width=150>Regulator</td>
<td width=150>Unit Terkait</td>
<td width="150">Penanggung Jawab</td>
<td width="150">Tanggal</td>
<td width="150">Masa Berlaku</td>
</tr></thead>
<h3><tbody>

<!--Memanggil data dari tabel seniman-->
<?php
if(isset($_POST['export'])){
	$dari=$_POST['dari'];
    $sampai=$_POST['sampai'];
    $query = mysql_query("SELECT
    tb_nomer.nomer,
    tb_peraturan.id_peraturan,
    tb_peraturan.judul,
    tb_peraturan.tahun,
    tb_peraturan.masa_berlaku,
    regulator.regulator,
    tb_peraturan.entry_date,
    tb_peraturan.`file`,
    tb_admin.nama_admin,
    unit.unit
    FROM
    tb_admin
    Inner Join tb_peraturan ON tb_peraturan.id_admin = tb_admin.id_admin
    Inner Join tb_nomer ON tb_peraturan.nomer = tb_nomer.id_nomer
    Inner Join regulator ON tb_peraturan.regulator = regulator.id_regulator
    Inner Join unit ON unit.id_unit = tb_admin.unit
     where tb_peraturan.entry_date Between '$dari' AND '$sampai'
                        ");
}
while($data=mysql_fetch_array($query)){
?>

<!--Menampilkan Data dari Tabel Seniman-->
<tr>
    <td align="center"><?php echo $data['nomer']; ?></td>
    <td align="center"><?php echo $data['judul']; ?></td>
    <td align="center"><?php echo $data['tahun']; ?></td>
    <td align="center"><?php echo $data['regulator']; ?></td>
    <td align="center"><?php echo $data['unit']; ?></td>
    <td align="center"><?php echo $data['nama_admin'];?></td>
    <td align="center"><?php echo $data['entry_date'];?></td>
    <td align="center"><?php echo $data['masa_berlaku']; ?></td>
    </tr>

<!--Penutup--> 
<?php
}?>
</tbody></h3></table>
