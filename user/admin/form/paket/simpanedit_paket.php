<?php 
include "../../../../assets/koneksi.php";
$id=$_POST['id'];
$tipe=$_POST['tipe'];
$lama=$_POST['lama'];
$level=$_POST['level'];
$jenis_waktu=$_POST['jenis_waktu'];
$biaya=$_POST['biaya'];
$book=$_POST['book'];
$fasilitas=nl2br($_POST['fasilitas']);



	$q1=mysqli_query($conn, "UPDATE paket set 
		nama_paket='$tipe',
		lama_potret='$lama',
		level_paket='$level',
		biaya='$biaya',
		jenis_waktu='$jenis_waktu',
		fasilitas='$fasilitas',
		bisa_booking='$book'
		where id_paket='$id';
		
		")or die(mysqli_error()); 

	
?>

	<script type="text/javascript">
		alert('Data paket berhasil diperbaharui');
		window.location.href="../../?a=paket"

	</script>
