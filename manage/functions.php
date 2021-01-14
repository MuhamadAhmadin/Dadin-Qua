<?php 

include 'config.php';
session_start();

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

// GLobal Function
function cek_session(){
	if (!isset($_SESSION['id_user'])) {
		// header("Location: ../index.php");
		echo '<script> 
			window.location = "../login";
		 </script>';
		die;
	}
}

function cek_on_admin($level){
	switch ($level) {
		case '1':
			# aman, dia benar di superadmin (level 1)
			break;
			
		case '2':
			echo '<script> 
					window.location = "../staff/";
				 </script>';
			break;

		default:
			echo '<script> 
					window.location = "../login";
				 </script>';
			break;
	}
}

function cek_on_staff($level){
	switch ($level) {
		case '1':
			echo '<script> 
					window.location = "../admin/";
				 </script>';
			break;
			
		case '2':
			// aman, karena dia staff (level 2)
			break;

		default:
			echo '<script> 
					window.location = "../login";
				 </script>';
			break;
	}
}

function get_status($status){
	switch ($status) {
		case '0':
			return "<span class='badge badge-warning'>Draft</span>";
			break;

		case '1':
			return "<span class='badge badge-success'>Publish</span>";
			break;

		case '2':
			return "<span class='badge badge-danger'>Un-Publish</span>";
			break;
		
		default:
			return "<span class='badge badge-default'>Default</span>";
			break;
	}
}

function get_status_galeri($status){
	switch ($status) {
		case '0':
			return "<span class='badge badge-warning'>Tidak Aktif</span>";
			break;

		case '1':
			return "<span class='badge badge-success'>Aktif</span>";
			break;
		
		default:
			return "<span class='badge badge-default'>Default</span>";
			break;
	}
}

function get_level($level){
	switch ($level) {
		case '1':
			return "<span class='badge badge-primary'>Super Admin</span>";
			break;

		case '2':
			return "<span class='badge badge-success'>Staff Web</span>";
			break;
		
		default:
			return "<span class='badge badge-default'>Default</span>";
			break;
	}
}

function get_tipe_menu($tipe){
	switch ($tipe) {
		case '0':
			return "<span class='badge badge-primary'>Menu Utama</span>";
			break;

		case '1':
			return "<span class='badge badge-success'>Sub Menu</span>";
			break;
		
		default:
			return "<span class='badge badge-default'>Default</span>";
			break;
	}
}

function active($currect_page, $open = false){
  $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
  $url = end($url_array);  
  if($currect_page == $url){
      if ($open == true) {
        echo 'active menu-open'; //class name in css 
      }else{
        echo 'active'; //class name in css 
      }
  } 
}

// Statistik
function ip_user() 
{
    if (! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    
    } elseif (! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    
    }

    return $ip;
}

/**
 * @see http://php.net/manual/en/function.get-browser.php;
 * @return 
 */
function browser_user()
{
    $browser = _userAgent();
    return $browser['name'] . ' v.'.$browser['version'];
}

/**
 * Deteksi UserAgent / Browser yang digunakan
 * @return [type] [description]
 */
function _userAgent()
{
    $u_agent    = $_SERVER['HTTP_USER_AGENT']; 
    $bname      = 'Unknown';
    $platform   = 'Unknown';
    $version    = "";

    $os_array   =   array(
                    '/windows nt 10.0/i'     =>  'Windows 10',
                    '/windows nt 6.2/i'     =>  'Windows 8',
                    '/windows nt 6.1/i'     =>  'Windows 7',
                    '/windows nt 6.0/i'     =>  'Windows Vista',
                    '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                    '/windows nt 5.1/i'     =>  'Windows XP',
                    '/windows xp/i'         =>  'Windows XP',
                    '/windows nt 5.0/i'     =>  'Windows 2000',
                    '/windows me/i'         =>  'Windows ME',
                    '/win98/i'              =>  'Windows 98',
                    '/win95/i'              =>  'Windows 95',
                    '/win16/i'              =>  'Windows 3.11',
                    '/macintosh|mac os x/i' =>  'Mac OS X',
                    '/mac_powerpc/i'        =>  'Mac OS 9',
                    '/linux/i'              =>  'Linux',
                    '/ubuntu/i'             =>  'Ubuntu',
                    '/iphone/i'             =>  'iPhone',
                    '/ipod/i'               =>  'iPod',
                    '/ipad/i'               =>  'iPad',
                    '/android/i'            =>  'Android',
                    '/blackberry/i'         =>  'BlackBerry',
                    '/webos/i'              =>  'Mobile'
                );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $u_agent)) {
            $platform    =   $value;
            break;
        }

    }

    // Next get the name of the useragent yes seperately and for good reason
    if (preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    
    } elseif(preg_match('/Firefox/i',$u_agent)) { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    
    } elseif(preg_match('/Chrome/i',$u_agent)) { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 

    } elseif (preg_match('/Safari/i',$u_agent)) { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 

    } elseif (preg_match('/Opera/i',$u_agent)) { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    
    } elseif (preg_match('/Netscape/i',$u_agent)) { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    }

    //  finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
   
    if (! preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
    
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        
        } else {
            $version= $matches['version'][1];
        }
    } else {
        $version= $matches['version'][0];
    }
    
    // check if we have a number
    $version = ( $version == null || $version == "" ) ? "?" : $version;
    
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'   => $pattern
    );
}

/**
 * @return name Operating System*/
function os_user()
{
    $OS = _userAgent();
    return $OS['platform'];
}

// Checking image
function processImage($file_name, $file_tmp, $no_black = false){
	// Getting file name
	$filename = date('his').'-'.$file_name;

	// Valid extension
	$valid_ext = array('png','jpeg','jpg');

	// Location
	$location = "upload/".$filename;

	// file extension
	$file_extension = pathinfo($location, PATHINFO_EXTENSION);
	$file_extension = strtolower($file_extension);

	// Check extension
	if(in_array($file_extension,$valid_ext)){

	if ($no_black == false) {
		// Compress Image
		compressImage($file_tmp,$location,60);
	}else{
		// jika no_black true artinya kalo png jangan di compress biar ga item backgroundnya
		move_uploaded_file($file_tmp, $location);
	}

	}else{
	echo "Invalid file type.";
	}
}

// Compress image
function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') 
    $image = imagecreatefromjpeg($source);

  elseif ($info['mime'] == 'image/gif') 
    $image = imagecreatefromgif($source);
  elseif ($info['mime'] == 'image/png') 
    $image = imagecreatefrompng($source);

  imagejpeg($image, $destination, $quality);

}


function get_total_row($table_name){
	global $conn;
	$query = mysqli_query($conn, "SELECT COUNT(*) AS JML FROM $table_name");
	$result = mysqli_fetch_assoc($query);
	return $result['JML'];
}

function limit_string($string, $max_length, $limited_to) {
	if (strlen($string) > $max_length){
   		return $string = substr($string, 0, $limited_to) . '...';
	}else{
		return $string;
	}
}

function slugify($text)	{
	  // replace non letter or digits by -
	  $text = preg_replace('~[^\pL\d]+~u', '-', $text);

	  // transliterate
	  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	  // remove unwanted characters
	  $text = preg_replace('~[^-\w]+~', '', $text);

	  // trim
	  $text = trim($text, '-');

	  // remove duplicate -
	  $text = preg_replace('~-+~', '-', $text);

	  // lowercase
	  $text = strtolower($text);

	  if (empty($text)) {
	    return 'n-a';
	  }

	  return $text;
}

function getBulanIndo($month){
    $bulanIndo = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];

    return $bulanIndo[$month];
}

function get_profile_foto($foto) {
	if ($foto == '') {
		$foto = '../upload/default_photo.jpg';
		return $foto;
	}else{
		$foto = '../upload/'.$foto;
		return $foto;
	}
}

function get_profile_foto_front($foto) {
	if ($foto == '') {
		$foto = 'manage/upload/default_photo.jpg';
		return $foto;
	}else{
		$foto = 'manage/upload/'.$foto;
		return $foto;
	}
}

// Login Function
if (isset($_POST['key']) && $_POST['key'] == "login") {
	$username = htmlspecialchars($_POST['username']);
	$pass = md5(md5($_POST['password']));

	$query = mysqli_query($conn, "SELECT COUNT(id) AS JML FROM users WHERE password = '$pass' AND username = '$username' ");

	$res = mysqli_fetch_assoc($query);
	$pesan = [];

	// jika ada akun di db
	if ($res['JML'] > 0) {

		// cek akun ini apakah levelnya 1 (admin) atau 2(staff)
		$q_cek = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' AND password = '$pass'");
		$r_cek = mysqli_fetch_assoc($q_cek);
		$d_level = $r_cek['level'];

		if ($d_level == 1) {
			// 1 adalah level admin web
			$qdata = mysqli_query($conn, "SELECT * FROM users WHERE password = '$pass' AND username = '$username'");

		}else if($d_level == 2){
			// 2 adalah level staff web
			$qdata = mysqli_query($conn, "SELECT * FROM users WHERE password = '$pass' AND username = '$username'");
		}

		$qres = mysqli_fetch_assoc($qdata);

		$_SESSION['id_user'] = $qres['id'];
		$_SESSION['level'] = $qres['level'];
		$qres['error'] = 0;

		echo json_encode($qres);
	}else{
		// tidak ada data users
		$pesan['error'] = 1;
		$pesan['message'] = "Akun tidak ditemukan";
		echo json_encode($pesan);
	}
}

// Master Kategori
if (isset($_POST['key']) && base64_decode($_POST['key']) == "kategori_hapus") {
	$id = htmlspecialchars(strip_tags($_POST['id_kategori']));

	$query = mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori = '$id'");


	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Kategori berhasil dihapus";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Kategori gagal dihapus";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "kategori_add") {
	$kategori = htmlspecialchars(strip_tags($_POST['kategori']));
	$slug_kategori = slugify($kategori);

	$query = mysqli_query($conn, "INSERT INTO kategori(kategori, slug_kategori) VALUES('$kategori', '$slug_kategori')");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Kategori berhasil ditambahkan";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Kategori gagal ditambahkan";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "kategori_update") {
	$id_kategori = htmlspecialchars(strip_tags($_POST['id_kategori']));
	$kategori = htmlspecialchars(strip_tags($_POST['kategori']));
	$slug_kategori = slugify($kategori);

	$query = mysqli_query($conn, "UPDATE kategori SET kategori = '$kategori', slug_kategori = '$slug_kategori' WHERE id_kategori = '$id_kategori'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Kategori berhasil diupdate";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Kategori gagal diupdate";
	}

	echo json_encode($pesan);
}


// Master Berita
if (isset($_POST['key']) && base64_decode($_POST['key']) == "berita_add") {
	$judul = htmlspecialchars(strip_tags($_POST['judul']));
	$slug = slugify($judul);
	$deskripsi = $_POST['deskripsi'];
	$status = $_POST['status'];
	$id_kategori = $_POST['id_kategori'];

	$id_user = $_SESSION['id_user'];

	if($_FILES['thumbnail']['error'] === 4){
		$thumbnail = '';
	}else{
		processImage($_FILES['thumbnail']['name'], $_FILES['thumbnail']['tmp_name']);
		$thumbnail = date('his').'-'.$_FILES['thumbnail']['name'];
	}

	$query = mysqli_query($conn, "INSERT INTO berita(judul, slug, gambar, deskripsi, id_kategori, status, id_user) VALUES('$judul', '$slug', '$thumbnail', '$deskripsi', '$id_kategori', '$status', '$id_user')");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Berita berhasil ditambahkan";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Berita gagal ditambahkan";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "berita_update") {

	$id_berita = $_POST['id_berita'];
	$judul = htmlspecialchars(strip_tags($_POST['judul']));
	$slug = slugify($judul);
	$deskripsi = $_POST['deskripsi'];
	$status = $_POST['status'];
	$id_kategori = $_POST['id_kategori'];

	$id_user = $_SESSION['id_user'];

	$gambar_old = $_POST['gambar_old'];

	$id_user = $_SESSION['id_user'];

	if($_FILES['thumbnail']['error'] === 4){
		$thumbnail = $gambar_old;
	}else{
		processImage($_FILES['thumbnail']['name'], $_FILES['thumbnail']['tmp_name']);
		$thumbnail = date('his').'-'.$_FILES['thumbnail']['name'];
	}

	$updated_at = date('Y-m-d H:i:s');

	$query = mysqli_query($conn, "UPDATE berita SET judul = '$judul',
													slug = '$slug',
													deskripsi = '$deskripsi',
													gambar = '$thumbnail',
													id_kategori = '$id_kategori',
													status = '$status',
													updated_at = '$updated_at',
													id_user = '$id_user'
													WHERE id_berita = '$id_berita'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Berita berhasil diupdate";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Berita gagal diupdate";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "berita_hapus") {
	$id = htmlspecialchars(strip_tags($_POST['id_berita']));

	$query = mysqli_query($conn, "DELETE FROM berita WHERE id_berita = '$id'");


	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Berita berhasil dihapus";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Berita gagal dihapus";
	}

	echo json_encode($pesan);
}


// Master Galeri
if (isset($_POST['key']) && base64_decode($_POST['key']) == "galeri_add") {
	$keterangan = htmlspecialchars(strip_tags($_POST['keterangan']));
	$aktif = $_POST['aktif'];

	$id_user = $_SESSION['id_user'];

	if($_FILES['galeri']['error'] === 4){
		$galeri = '';
	}else{
		processImage($_FILES['galeri']['name'], $_FILES['galeri']['tmp_name']);
		$galeri = date('his').'-'.$_FILES['galeri']['name'];
	}

	$query = mysqli_query($conn, "INSERT INTO galeri(galeri, keterangan, aktif, id_user) VALUES('$galeri', '$keterangan', '$aktif', '$id_user')");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Galeri berhasil ditambahkan";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Galeri gagal ditambahkan";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "galeri_hapus") {
	$id = htmlspecialchars(strip_tags($_POST['id_galeri']));

	$query = mysqli_query($conn, "DELETE FROM galeri WHERE id_galeri = '$id'");


	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Galeri berhasil dihapus";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Galeri gagal dihapus";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "galeri_update") {

	$id_galeri = $_POST['id_galeri'];
	$keterangan = htmlspecialchars(strip_tags($_POST['keterangan']));
	$aktif = $_POST['aktif'];

	$id_user = $_SESSION['id_user'];

	$galeri_old = $_POST['galeri_old'];

	$id_user = $_SESSION['id_user'];

	if($_FILES['galeri']['error'] === 4){
		$galeri = $galeri_old;
	}else{
		processImage($_FILES['galeri']['name'], $_FILES['galeri']['tmp_name']);
		$galeri = date('his').'-'.$_FILES['galeri']['name'];
	}

	$updated_at = date('Y-m-d H:i:s');

	$query = mysqli_query($conn, "UPDATE galeri SET keterangan = '$keterangan',
													galeri = '$galeri',
													aktif = '$aktif',
													updated_at = '$updated_at',
													id_user = '$id_user'
													WHERE id_galeri = '$id_galeri'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Galeri berhasil diupdate";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Galeri gagal diupdate";
	}

	echo json_encode($pesan);
}

// Master Member
if (isset($_POST['key']) && base64_decode($_POST['key']) == "member_add") {
	$keterangan = htmlspecialchars(strip_tags($_POST['keterangan']));
	$nama = htmlspecialchars(strip_tags($_POST['nama']));
	$aktif = $_POST['aktif'];

	$id_user = $_SESSION['id_user'];

	if($_FILES['foto']['error'] === 4){
		$foto = '';
	}else{
		processImage($_FILES['foto']['name'], $_FILES['foto']['tmp_name']);
		$foto = date('his').'-'.$_FILES['foto']['name'];
	}

	$query = mysqli_query($conn, "INSERT INTO member(foto, nama, keterangan, aktif, id_user) VALUES('$foto', '$nama', '$keterangan', '$aktif', '$id_user')");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Member berhasil ditambahkan";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Member gagal ditambahkan";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "member_hapus") {
	$id = htmlspecialchars(strip_tags($_POST['id_member']));

	$query = mysqli_query($conn, "DELETE FROM member WHERE id_member = '$id'");


	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Member berhasil dihapus";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Member gagal dihapus";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "member_update") {

	$id_member = $_POST['id_member'];
	$keterangan = htmlspecialchars(strip_tags($_POST['keterangan']));
	$nama = htmlspecialchars(strip_tags($_POST['nama']));
	$aktif = $_POST['aktif'];

	$id_user = $_SESSION['id_user'];

	$foto_old = $_POST['foto_old'];

	$id_user = $_SESSION['id_user'];

	if($_FILES['foto']['error'] === 4){
		$foto = $foto_old;
	}else{
		processImage($_FILES['foto']['name'], $_FILES['foto']['tmp_name']);
		$foto = date('his').'-'.$_FILES['foto']['name'];
	}

	$updated_at = date('Y-m-d H:i:s');

	$query = mysqli_query($conn, "UPDATE member SET keterangan = '$keterangan',
													nama = '$nama',
													foto = '$foto',
													aktif = '$aktif',
													updated_at = '$updated_at',
													id_user = '$id_user'
													WHERE id_member = '$id_member'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Member berhasil diupdate";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Member gagal diupdate";
	}

	echo json_encode($pesan);
}

// Profil Dirpolairud
if (isset($_POST['key']) && base64_decode($_POST['key']) == "dirpolairud_update") {

	$keterangan = htmlspecialchars(strip_tags($_POST['keterangan']));
	$nama = htmlspecialchars(strip_tags($_POST['nama']));
	$link_detail = htmlspecialchars(strip_tags($_POST['link_detail']));

	$id_user = $_SESSION['id_user'];

	$foto_old = $_POST['foto_old'];


	if($_FILES['foto']['error'] === 4){
		$foto = $foto_old;
	}else{
		processImage($_FILES['foto']['name'], $_FILES['foto']['tmp_name']);
		$foto = date('his').'-'.$_FILES['foto']['name'];
	}

	$updated_at = date('Y-m-d H:i:s');

	$query = mysqli_query($conn, "UPDATE dirpolairud SET keterangan = '$keterangan',
													nama = '$nama',
													foto = '$foto',
													link_detail = '$link_detail',
													updated_at = '$updated_at'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Profil berhasil diupdate";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Profil gagal diupdate";
	}

	echo json_encode($pesan);
}

// Master Faq
if (isset($_POST['key']) && base64_decode($_POST['key']) == "faq_add") {
	$tanya = htmlspecialchars(strip_tags($_POST['tanya']));
	$jawab = $_POST['jawab'];
	$urutan = $_POST['urutan'];
	$aktif = $_POST['aktif'];

	$id_user = $_SESSION['id_user'];

	$query = mysqli_query($conn, "INSERT INTO faq(tanya, jawab, urutan, id_user, aktif) VALUES('$tanya', '$jawab', '$urutan', '$id_user', '$aktif')");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Tanya-Jawab berhasil ditambahkan";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Tanya-Jawab gagal ditambahkan";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "faq_hapus") {
	$id = htmlspecialchars(strip_tags($_POST['id_faq']));

	$query = mysqli_query($conn, "DELETE FROM faq WHERE id_faq = '$id'");


	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Tanya-Jawab berhasil dihapus";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Tanya-Jawab gagal dihapus";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "faq_update") {
	$id_faq = htmlspecialchars(strip_tags($_POST['id_faq']));
	$tanya = htmlspecialchars(strip_tags($_POST['tanya']));
	$jawab = $_POST['jawab'];
	$urutan = $_POST['urutan'];
	$aktif = $_POST['aktif'];

	$id_user = $_SESSION['id_user'];

	$updated_at = date('Y-m-d H:i:s');

	$query = mysqli_query($conn, "UPDATE faq SET tanya = '$tanya', jawab = '$jawab', urutan = '$urutan', aktif = '$aktif', id_user = '$id_user', updated_at = '$updated_at' WHERE id_faq = '$id_faq'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Tanya-Jawab berhasil diupdate";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Tanya-Jawab gagal diupdate";
	}

	echo json_encode($pesan);
}


// Master Informasi Kontak
if (isset($_POST['key']) && base64_decode($_POST['key']) == "kontak_update") {

	$email1 = htmlspecialchars(strip_tags($_POST['email1']));
	$email2 = htmlspecialchars(strip_tags($_POST['email2']));
	$telp1 = htmlspecialchars(strip_tags($_POST['telp1']));
	$telp2 = htmlspecialchars(strip_tags($_POST['telp2']));
	$alamat = htmlspecialchars(strip_tags($_POST['alamat']));

	$id_user = $_SESSION['id_user'];

	$logo_web_old = $_POST['logo_web_old'];


	if($_FILES['logo_web']['error'] === 4){
		$logo_web = $logo_web_old;
	}else{
		processImage($_FILES['logo_web']['name'], $_FILES['logo_web']['tmp_name'], true);
		$logo_web = date('his').'-'.$_FILES['logo_web']['name'];
	}

	$updated_at = date('Y-m-d H:i:s');

	$query = mysqli_query($conn, "UPDATE kontak SET email1 = '$email1',
													email2 = '$email2',
													telp1 = '$telp1',
													telp2 = '$telp2',
													alamat = '$alamat',
													id_user = '$id_user',
													logo_web = '$logo_web',
													updated_at = '$updated_at'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Informasi berhasil diupdate";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Informasi gagal diupdate";
	}

	echo json_encode($pesan);
}


// Profil Airud
if (isset($_POST['key']) && base64_decode($_POST['key']) == "airud_update") {

	$keterangan = htmlspecialchars(strip_tags($_POST['keterangan']));
	$keterangan_aceh = htmlspecialchars(strip_tags($_POST['keterangan_aceh']));

	$foto_old = $_POST['foto_old'];
	$foto_aceh_old = $_POST['foto_aceh_old'];


	if($_FILES['foto']['error'] === 4){
		$foto = $foto_old;
	}else{
		processImage($_FILES['foto']['name'], $_FILES['foto']['tmp_name']);
		$foto = date('his').'-'.$_FILES['foto']['name'];
	}

	if($_FILES['foto_aceh']['error'] === 4){
		$foto_aceh = $foto_aceh_old;
	}else{
		processImage($_FILES['foto_aceh']['name'], $_FILES['foto_aceh']['tmp_name']);
		$foto_aceh = date('his').'-'.$_FILES['foto_aceh']['name'];
	}

	$updated_at = date('Y-m-d H:i:s');

	$query = mysqli_query($conn, "UPDATE airud SET keterangan = '$keterangan',
													foto = '$foto',
													keterangan_aceh = '$keterangan_aceh',
													foto_aceh = '$foto_aceh',
													updated_at = '$updated_at'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Profil berhasil diupdate";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Profil gagal diupdate";
	}

	echo json_encode($pesan);
}


// Master Menu
if (isset($_POST['key']) && base64_decode($_POST['key']) == "menu_hapus") {
	$id = htmlspecialchars(strip_tags($_POST['id_menu']));

	$query = mysqli_query($conn, "DELETE FROM menu WHERE id_menu = '$id'");


	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Menu berhasil dihapus";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Menu gagal dihapus";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "menu_add") {
	$menu = htmlspecialchars(strip_tags($_POST['menu']));
	$urutan = $_POST['urutan'];
	$aktif = $_POST['aktif'];

	$slug_menu = slugify($menu);

	$tipe_link = $_POST['tipe_link'];
	if ($tipe_link == 'custom_link') {
		// custom link
		$id_page = 0;
		$link = $_POST['link'];
	}else{
		// ada id halaman ke halaman tertentu
		$id_page = $_POST['id_page'];
		$link = '';
	}

	$tipe = $_POST['tipe'];
	if ($tipe == '0') {
		// main menu
		$id_parent_menu = 0; // kosongkan parent menu karena ini adalah main menu
	}else{
		// sub menu , ada id_menu / parent_menu
		$id_parent_menu = $_POST['id_parent_menu'];
	}

	$query = mysqli_query($conn, "INSERT INTO menu(menu, link, urutan, aktif, id_page, slug_menu, tipe, id_parent_menu) VALUES('$menu', '$link', '$urutan', '$aktif', '$id_page', '$slug_menu', '$tipe', '$id_parent_menu')");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Menu berhasil ditambahkan";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Menu gagal ditambahkan";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "menu_update") {
	$id_menu = htmlspecialchars(strip_tags($_POST['id_menu']));
	$menu = htmlspecialchars(strip_tags($_POST['menu']));
	$link = $_POST['link'];
	$slug_menu = slugify($menu);
	$urutan = $_POST['urutan'];
	$aktif = $_POST['aktif'];

	$tipe = $_POST['tipe'];
	if ($tipe == '0') {
		// main menu
		$id_parent_menu = 0; // kosongkan parent menu karena ini adalah main menu
	}else{
		// sub menu , ada id_menu / parent_menu
		$id_parent_menu = $_POST['id_parent_menu'];
	}

	$tipe_link = $_POST['tipe_link'];
	if ($tipe_link == 'custom_link') {
		// custom link
		$id_page = 0;
		$link = $_POST['link'];
	}else{
		// ada id halaman ke halaman tertentu
		$id_page = $_POST['id_page'];
		$link = '';
	}

	$query = mysqli_query($conn, "UPDATE menu SET menu = '$menu', link = '$link', urutan = '$urutan', aktif = '$aktif', id_page = '$id_page', slug_menu = '$slug_menu', tipe = '$tipe', id_parent_menu = '$id_parent_menu' WHERE id_menu = '$id_menu'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Menu berhasil diupdate";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Menu gagal diupdate";
	}

	echo json_encode($pesan);
}


// Master Sub Menu
if (isset($_POST['key']) && base64_decode($_POST['key']) == "submenu_hapus") {
	$id = htmlspecialchars(strip_tags($_POST['id_submenu']));

	$query = mysqli_query($conn, "DELETE FROM submenu WHERE id_submenu = '$id'");


	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Sub Menu berhasil dihapus";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Sub Menu gagal dihapus";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "submenu_add") {
	$submenu = htmlspecialchars(strip_tags($_POST['submenu']));

	$urutan_submenu = $_POST['urutan_submenu'];
	$id_menu = $_POST['id_menu'];
	$aktif = $_POST['aktif'];

	$slug_submenu = slugify($submenu);

	$tipe_link = $_POST['tipe_link'];
	if ($tipe_link == 'custom_link') {
		// custom link
		$id_page = 0;
		$link_submenu = $_POST['link_submenu'];
	}else{
		// ada id halaman ke halaman tertentu
		$id_page = $_POST['id_page'];
		$link_submenu = '';
	}

	$query = mysqli_query($conn, "INSERT INTO submenu(submenu, link_submenu, urutan_submenu, aktif, id_menu, id_page, slug_submenu) VALUES('$submenu', '$link_submenu', '$urutan_submenu', '$aktif', '$id_menu', '$id_page', '$slug_submenu')");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Sub Menu berhasil ditambahkan";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Sub Menu gagal ditambahkan";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "submenu_update") {
	$id_submenu = htmlspecialchars(strip_tags($_POST['id_submenu']));
	$submenu = htmlspecialchars(strip_tags($_POST['submenu']));
	$link_submenu = $_POST['link_submenu'];
	$urutan_submenu = $_POST['urutan_submenu'];
	$aktif = $_POST['aktif'];
	$id_menu = $_POST['id_menu'];

	$query = mysqli_query($conn, "UPDATE submenu SET submenu = '$submenu', link_submenu = '$link_submenu', urutan_submenu = '$urutan_submenu', aktif = '$aktif', id_menu = '$id_menu' WHERE id_submenu = '$id_submenu'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Sub Menu berhasil diupdate";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Sub Menu gagal diupdate";
	}

	echo json_encode($pesan);
}


// Master User
if (isset($_POST['key']) && base64_decode($_POST['key']) == "users_add") {
	$nama = htmlspecialchars(strip_tags($_POST['nama']));
	$username = htmlspecialchars(strip_tags($_POST['username']));
	$email = htmlspecialchars(strip_tags($_POST['email']));
	$password = md5(md5($_POST['password']));

	$aktif = $_POST['aktif'];
	$level = $_POST['level'];

	$id_user = $_SESSION['id_user'];

	if($_FILES['foto']['error'] === 4){
		$foto = '';
	}else{
		processImage($_FILES['foto']['name'], $_FILES['foto']['tmp_name']);
		$foto = date('his').'-'.$_FILES['foto']['name'];
	}

	$query = mysqli_query($conn, "INSERT INTO users(nama, username, password, email, aktif, level, foto) VALUES('$nama', '$username', '$password', '$email', '$aktif', '$level', '$foto')");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "User berhasil ditambahkan";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "User gagal ditambahkan";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "users_hapus") {
	$id = htmlspecialchars(strip_tags($_POST['id']));

	$query = mysqli_query($conn, "DELETE FROM users WHERE id = '$id'");


	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "User berhasil dihapus";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "User gagal dihapus";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "users_update") {

	$id = $_POST['id'];
	$nama = htmlspecialchars(strip_tags($_POST['nama']));
	$username = htmlspecialchars(strip_tags($_POST['username']));
	$email = htmlspecialchars(strip_tags($_POST['email']));
	$level = htmlspecialchars(strip_tags($_POST['level']));
	$aktif = $_POST['aktif'];

	$foto_old = $_POST['foto_old'];

	$id_user = $_SESSION['id_user'];

	if($_FILES['foto']['error'] === 4){
		$foto = $foto_old;
	}else{
		processImage($_FILES['foto']['name'], $_FILES['foto']['tmp_name']);
		$foto = date('his').'-'.$_FILES['foto']['name'];
	}

	$updated_at = date('Y-m-d H:i:s');

	$query = mysqli_query($conn, "UPDATE users SET username = '$username',
													nama = '$nama',
													aktif = '$aktif',
													email = '$email',
													foto = '$foto',
													updated_at = '$updated_at'
													WHERE id = '$id'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "User berhasil diupdate";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "User gagal diupdate";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "users_reset") {

	$id = $_POST['id'];

	$pass = md5(md5('123456'));

	$updated_at = date('Y-m-d H:i:s');

	$query = mysqli_query($conn, "UPDATE users SET password = '$pass',
													updated_at = '$updated_at'
													WHERE id = '$id'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Password berhasil reset menjadi 123456";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Password gagal reset menjadi 123456";
	}

	echo json_encode($pesan);
}


// Master Halaman
if (isset($_POST['key']) && base64_decode($_POST['key']) == "pages_add") {
	$judul = htmlspecialchars(strip_tags($_POST['judul']));
	$deskripsi = $_POST['deskripsi'];
	$aktif = $_POST['aktif'];

	$id_user = $_SESSION['id_user'];

	if($_FILES['gambar']['error'] === 4){
		$gambar = '';
	}else{
		processImage($_FILES['gambar']['name'], $_FILES['gambar']['tmp_name']);
		$gambar = date('his').'-'.$_FILES['gambar']['name'];
	}

	$query = mysqli_query($conn, "INSERT INTO pages(judul, gambar, deskripsi, aktif, id_user) VALUES('$judul', '$gambar', '$deskripsi', '$aktif', '$id_user')");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Halaman berhasil ditambahkan";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Halaman gagal ditambahkan";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "pages_update") {

	$id_page = $_POST['id_page'];
	$judul = htmlspecialchars(strip_tags($_POST['judul']));

	$deskripsi = $_POST['deskripsi'];

	$aktif = $_POST['aktif'];

	$id_user = $_SESSION['id_user'];

	$gambar_old = $_POST['gambar_old'];

	$id_user = $_SESSION['id_user'];

	if($_FILES['gambar']['error'] === 4){
		$gambar = $gambar_old;
	}else{
		processImage($_FILES['gambar']['name'], $_FILES['gambar']['tmp_name']);
		$gambar = date('his').'-'.$_FILES['gambar']['name'];
	}

	$updated_at = date('Y-m-d H:i:s');

	$query = mysqli_query($conn, "UPDATE pages SET judul = '$judul',
													deskripsi = '$deskripsi',
													gambar = '$gambar',
													aktif = '$aktif',
													updated_at = '$updated_at',
													id_user = '$id_user'
													WHERE id_page = '$id_page'");

	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Halaman berhasil diupdate";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Halaman gagal diupdate";
	}

	echo json_encode($pesan);
}

if (isset($_POST['key']) && base64_decode($_POST['key']) == "pages_hapus") {
	$id = htmlspecialchars(strip_tags($_POST['id_page']));

	$query = mysqli_query($conn, "DELETE FROM pages WHERE id_page = '$id'");


	$pesan = [];

	if ($query) {
		$pesan['error'] = 0;
		$pesan['message'] = "Halaman berhasil dihapus";
	}else{
		$pesan['error'] = 1;
		$pesan['message'] = "Halaman gagal dihapus";
	}

	echo json_encode($pesan);
}

?>