<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<!-- Table with stripped rows -->
 <div class="row">
                <?php foreach ($product as $key => $item) : ?>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="<?php echo base_url() . "img/" . $item['foto'] ?>" alt="..." width="100%">
                                <h5 class="card-title"><?php echo $item['nama'] ?><br><?php echo $item['harga'] ?></h5>
                            </div>
                        </div>        
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
