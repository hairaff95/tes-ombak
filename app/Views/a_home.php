<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!-- Table with stripped rows -->

<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
 <div class="row">
                <?php foreach ($product as $key => $item) : ?>
                    <div class="col-lg-6">
                        <?= form_open('keranjang') ?>
                        <?php
                        echo form_hidden('id', $item['id']);
                        echo form_hidden('nama', $item['nama']);
                        echo form_hidden('harga', $item['harga']);
                        echo form_hidden('foto', $item['foto']);
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <img src="<?php echo base_url() . "img/" . $item['foto'] ?>" alt="..." width="100%">
                                <h5 class="card-title"><?php echo $item['nama'] ?><br><?php echo number_to_currency($item['harga'], 'IDR') ?></h5>
                                <button type="submit" class="btn btn-info rounded-pill">Beli</button>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                <?php endforeach ?>
              </div>

              
<table class="table datatable">
                <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $index => $user) : ?>
            <tr>
                <th scope="row"><?= $index + 1 ?></th>
                <td><?= esc($user['username']) ?></td>
                <td><?= esc($user['email']) ?></td>
                <td><?= esc($user['role']) ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<!-- End Table with stripped rows -->
<?= $this->endSection() ?>
