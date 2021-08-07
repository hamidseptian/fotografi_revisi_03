<?php 
include "../../../../assets/koneksi.php";
$tipe=$_POST['tipe'];
$lama=$_POST['lama'];
$level=$_POST['level'];
$biaya=$_POST['biaya'];
$jenis_waktu=$_POST['jenis_waktu'];
$book=$_POST['book'];
$fasilitas=nl2br($_POST['fasilitas']);

	$q1=mysqli_query($conn, "INSERT into paket set 
		nama_paket='$tipe',
		bisa_booking='$book',
		lama_potret='$lama',
		level_paket='$level',
		fasilitas='$fasilitas',
		biaya='$biaya',
		jenis_waktu='$jenis_waktu'
		")or die(mysqli_error()); 
?>

	<script type="text/javascript">
		alert('Data paket disimpan');
		window.location.href="../../?a=paket"

	</script>
