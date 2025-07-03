<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<!-- Flash message -->
<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('errors')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= implode('<br>', session()->getFlashdata('errors')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<!-- Tombol Tambah -->
<button class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Data</button>

<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" action="<?= base_url('diskon/store') ?>">
      <?= csrf_field() ?>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Diskon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <label for="tanggal">Tanggal</label>
          <input type="date" name="tanggal" class="form-control" required>

          <label for="nominal" class="mt-2">Nominal</label>
          <input type="number" name="nominal" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Tabel Data Diskon -->
<table class="table datatable mt-3">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Nominal (Rp)</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($diskon as $index => $item) : ?>
      <tr>
        <th scope="row"><?= $index + 1 ?></th>
        <td><?= esc($item['tanggal']) ?></td>
        <td><?= number_format($item['nominal'], 0, ',', '.') ?></td>
        <td>
          <button type="button" class="btn btn-success btn-sm btn-edit"
            data-id="<?= $item['id'] ?>"
            data-tanggal="<?= $item['tanggal'] ?>"
            data-nominal="<?= $item['nominal'] ?>"
            data-bs-toggle="modal" data-bs-target="#modalEdit">
            Ubah
          </button>

          <form action="<?= site_url('diskon/delete/' . $item['id']) ?>" method="post" style="display:inline-block;">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                Hapus
            </button>
        </form> <!-- Tambahkan penutup form -->
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="post" id="formEdit" action="#">
      <?= csrf_field() ?>
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Diskon</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="edit-id">
          <label for="edit-tanggal">Tanggal</label>
          <input type="date" name="tanggal" id="edit-tanggal" class="form-control" required>

          <label for="edit-nominal" class="mt-2">Nominal</label>
          <input type="number" name="nominal" id="edit-nominal" class="form-control" required>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- JS untuk Modal Edit -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  function initEditButtons() {
    document.querySelectorAll('.btn-edit').forEach(button => {
      button.onclick = function () {
        const id = this.dataset.id;
        const tanggal = this.dataset.tanggal;
        const nominal = this.dataset.nominal;

        const form = document.getElementById('formEdit');
        if (form) {
          document.getElementById('edit-id').value = id;
          document.getElementById('edit-tanggal').value = tanggal;
          document.getElementById('edit-nominal').value = nominal;
          form.action = `/diskon/update/${id}`;
        }
      };
    });
  }

  initEditButtons(); // Panggil saat halaman selesai dimuat
});
</script>


<?= $this->endSection() ?>
