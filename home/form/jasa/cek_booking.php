
<?php 
include "../../../assets/koneksi.php";
$tglbook =$_POST['tglbook'];
$id =$_POST['idpaket'];
$lama =$_POST['lama'] -1;
$jambook =$_POST['jambook'];
$kegiatan =$_POST['kegiatan'];
$qcek = mysqli_query($conn, "SELECT min(tanggal_mulai) as tglawal, max(tanggal_selesai) as tglakhir from booking ");
 // where status='Booking' or status='Berlangsung'
// where status in ('Berlangsung','Dalam Proses','Order')
$dcek = mysqli_fetch_array($qcek);
$tglawal =  $dcek['tglawal'];
$akhir =  $dcek['tglakhir'];
$sesudah = date('Y-m-d', strtotime("+".$lama." days", strtotime($tglbook)));
$tgl_booking = $tglbook;//.' '.$jambook.':00';     
echo 'Mulai  : '.$tglbook.'<br>';
echo 'Selesai  : '.$sesudah.'<br>';

$q = mysqli_query($conn, "SELECT * from booking b left join paket p on b.id_paket= p.id_paket where b.tanggal_mulai >= '$tglawal' and b. tanggal_selesai <= '$akhir'");

$nilai = 0; ?>

<h4> Bookingan Tanggal <?php echo $tglbook.' - '.$nilai ?></h4>
<table class="table table-striped table-bordered">
    <tr>
        <td>No</td>
        <td>Paket</td>
        <td>Kegiatan</td>
        <td>Lama Kegiatan</td>
        <td>Waktu Mulai Acara</td>
        <td>Waktu Selesai Acara</td>
    </tr>
    <?php
    $no = 0;
    $order =0;

                       
    while ($d=mysqli_fetch_array($q)) {
        $pwm = explode(' ', $d['tanggal_mulai']);
        $pws = explode(' ', $d['tanggal_selesai']);
      
        if (strtotime($tgl_booking) >= strtotime($pwm[0]) && strtotime($tgl_booking) <= strtotime($pws[0]) ) {
            $nilai = 1;
            $style="";  
            $order +=1;
            $no++;
            // echo 'Jalan';
        }else{
            $style="style='display:none'";  
            
        }?>
        <tr <?php  echo $style ?>>
            
            <td><?php echo  $no ?></td>
            <td><?php echo  $d['nama_paket'].''.$d['level_paket'] ?></td>
            <td><?php echo  $d['kegiatan'] ?></td>
            <td><?php echo  $d['lama_acara'] ?> Hari</td>
            <td><?php echo  $d['tanggal_mulai'] ?></td>
            <td><?php echo  $d['tanggal_selesai'] ?></td>
        </tr>

    <?php } ?>
</table>

<?php if ($order>=3) { ?>
	Tidak bisa melakukan booking karena jadwal fotografer full
<?php 	}else{ ?>
<a href="?m=addbooking&tgl=<?php echo $tglbook ?>&idj=<?php echo $id ?>&k=<?php echo $kegiatan ?>&lama=<?php echo $lama ?>&jambook=<?php echo $jambook ?>&tgl_selesai=<?php echo  $sesudah ?>" class="btn btn-info btn-xs">Booking</a>

<?php 	} ?>
    
