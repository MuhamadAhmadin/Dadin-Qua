<?php 

// Pagination Config
$jumlahDataPerHalaman = 6;
$jumlahData = count(query("SELECT * FROM berita"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

$q_berita = query("SELECT * FROM berita LIMIT $awalData, $jumlahDataPerHalaman");

?>

<!-- Loop card berita -->
<?php foreach($q_berita as $row): ?>
  <div class="col-lg-6 col-md-6 kotak mb-5">
    <a href="berita/<?= $row['slug']; ?>/">
      <div class="bungkus" style='background:url("<?= get_profile_foto_front($row['gambar']); ?>");'>
      </div>
    </a>
      <a href="berita/<?= $row['slug']; ?>/" class="title judul"><?= limit_string($row['judul'], 57, 57); ?></a>
      <p class="deskripsi"><?= limit_string(htmlspecialchars(strip_tags($row['deskripsi'])), 230, 230) ?></p>
  </div>
<?php endforeach; ?>

<!-- Set the paging button -->

 <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
	<?php if( $i == $halamanAktif ) : ?>
		<li class="page-item"><a class="page-link active" href="berita?halaman=<?= $i; ?>"><?= $i; ?></a></li>
	<?php else : ?>
		<li class="page-item"><a class="page-link" href="berita?halaman=<?= $i; ?>"><?= $i; ?></a></li>
	<?php endif; ?>
<?php endfor; ?>