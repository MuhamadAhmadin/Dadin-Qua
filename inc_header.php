<?php 

// rekam data user yang sudah mengakses website kita
$ip      = ip_user();
$browser = browser_user();
$os      = os_user();

// untuk tes hilangkan comment dibawah ini
// unset($_COOKIE['VISITOR']);

// Check bila sebelumnya data pengunjung sudah terrekam
if (! isset($_COOKIE['VISITOR'])) {

    // Masa akan direkam kembali
    // Tujuan untuk menghindari merekam pengunjung yang sama dihari yang sama.
    // Cookie akan disimpan selama 24 jam
    echo "<script>
        console.log('visitor');
    </script>";
    $duration = time()+60*60*24;

    // simpan kedalam cookie browser
    setcookie('VISITOR',$browser,$duration);

    // current time
    $dateTime = date('Y-m-d H:i:s');

    // SQL Command atau perintah SQL INSERT
    $sql = "INSERT INTO statistik (ip, os, browser, tanggal) VALUES ('$ip', '$os', '$browser', '$dateTime')";

    $query = mysqli_query($conn, $sql);

}else{
    echo "<script>
        console.log('bukan visitor');
    </script>";
}

 ?>