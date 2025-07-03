<?= $this->extend('layout'); ?>

<?= $this->section('content'); ?>
<div class="pagetitle">
  <h1>Frequently Asked Questions</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url('/') ?>">Home</a></li>
      <li class="breadcrumb-item active">FAQ</li>
    </ol>
  </nav>
</div>

<section class="section faq">
  <div class="row">
    <div class="col-lg-12">
      <div class="accordion" id="faqAccordion">

        <?php
        $faqs = [
          ['Apa itu aplikasi ini?', 'Ini adalah platform toko online berbasis CodeIgniter 4 untuk menampilkan produk, keranjang belanja, dan transaksi.'],
          ['Bagaimana cara mendaftar sebagai pengguna?', 'Klik tombol "Register" di atas, isi data Anda, dan login untuk mulai berbelanja.'],
          ['Saya lupa password, bagaimana meresetnya?', 'Saat ini belum tersedia reset otomatis. Silakan hubungi admin.'],
          ['Bagaimana menambahkan produk ke keranjang?', 'Klik tombol "Tambah ke Keranjang" di halaman produk. Jumlah bisa diubah di halaman keranjang.'],
          ['Apakah perlu login untuk checkout?', 'Ya. Checkout hanya bisa dilakukan oleh pengguna yang sudah login.'],
          ['Bagaimana admin menambahkan produk baru?', 'Masuk ke Panel Admin > Manajemen Produk, lalu klik Tambah Produk.'],
          ['Bisakah melihat riwayat transaksi?', 'Ya. Pengguna login dapat melihat riwayat melalui menu Transaksi.'],
          ['Bagaimana cara export laporan transaksi?', 'Admin dapat klik tombol "Export PDF" di halaman Laporan Transaksi.'],
          ['Tampilan UI menggunakan apa?', 'Aplikasi menggunakan template NiceAdmin yang responsif dan modern.'],
          ['Bisakah digunakan di hosting lain?', 'Ya. Selama PHP >= 7.4 dan Composer tersedia di hosting Anda.']
        ];

        foreach ($faqs as $index => $faq): ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?= $index ?>">
              <button class="accordion-button <?= $index !== 0 ? 'collapsed' : '' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $index ?>" aria-expanded="<?= $index === 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $index ?>">
                <?= $faq[0] ?>
              </button>
            </h2>
            <div id="collapse<?= $index ?>" class="accordion-collapse collapse <?= $index === 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $index ?>" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                <?= $faq[1] ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>
</section>
<?= $this->endSection(); ?>
