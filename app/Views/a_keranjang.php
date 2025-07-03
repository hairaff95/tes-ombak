<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
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
<?php echo form_open('keranjang/edit') ?>
<!-- Table with stripped rows -->
<table class="table datatable">
    <thead>
        <tr>
            <th scope="col">Nama</th>
            <th scope="col">Foto</th>
            <th scope="col">Harga</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        $totalDiskon = 0;
        if (!empty($items)) :
            foreach ($items as $index => $item) :
                $hargaAwal = $item['options']['harga_awal'] ?? $item['price']; // fallback
                $diskon = $item['options']['diskon'] ?? 0;
                $subtotalDiskon = $diskon * $item['qty'];
                $totalDiskon += $subtotalDiskon;
        ?>
                <tr>
                    <td>
                        <?= esc($item['name']) ?><br>
                        <small class="text-muted">Harga Awal: Rp <?= number_format($hargaAwal, 0, ',', '.') ?></small><br>
                        <small class="text-danger">Diskon/item: Rp <?= number_format($diskon, 0, ',', '.') ?></small>
                    </td>
                    <td><img src="<?= base_url("img/" . $item['options']['foto']) ?>" width="100px"></td>
                    <td><?= number_to_currency($item['price'], 'IDR') ?></td>
                    <td>
                        <input type="number" min="1" name="qty<?= $i++ ?>" class="form-control" value="<?= $item['qty'] ?>">
                    </td>
                    <td><?= number_to_currency($item['subtotal'], 'IDR') ?></td>
                    <td>
                        <a href="<?= base_url('keranjang/delete/' . $item['rowid']) ?>" class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>
        <?php
            endforeach;
        endif;
        ?>
    </tbody>
</table>
<!-- End Table with stripped rows -->
<div class="alert alert-info">
    <div><strong>Total Diskon:</strong> Rp <?= number_format($totalDiskon, 0, ',', '.') ?></div>
    <div><strong>Total Bayar:</strong> <?= number_to_currency($total, 'IDR') ?></div>
</div>


<button type="submit" class="btn btn-primary">Perbarui Keranjang</button>
<a class="btn btn-warning" href="<?php echo base_url() ?>keranjang/clear">Kosongkan Keranjang</a>

<?php if (!empty($items)) : ?>
    <a class="btn btn-success" href="<?php echo base_url() ?>checkout">Selesai Belanja</a>
<?php endif; ?> 
<?php echo form_close() ?>
<?= $this->endSection() ?>