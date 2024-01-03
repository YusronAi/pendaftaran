<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>


<div class="container-fluid">
    <a href="/input-dokter"><button class="btn btn-success m-3">Input Dokter</button></a>
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mb-3 text-center" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <tr style="text-align: center;">
                <th class="th-sm">No

                </th>
                <th class="th-sm">Nama Dokter
                <th class="th-sm">Alamat</th>

                </th>
                <th class="th-sm">Telephone

                </th>
                <th class="th-sm">Tarif

                </th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($dokter as $item) : ?>
                <tr style="text-align: center;">
                    <td><?= $i; ?></td>
                    <td><?= $item['nama_dokter']; ?></td>
                    <td><?= $item['alamat_dokter']; ?></td>
                    <td><?= $item['telephone']; ?></td>
                    <td><?= $item['tarif']; ?></td>
                    <td><a href="/ubah-dokter/<?= $item['id_dokter']; ?>"><button class="btn btn-success">Edit</button></a> <a href="/hapus-dokter/<?= $item['id_dokter']; ?>"><button class="btn btn-danger">Delete</button></a></td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>
    </table>
<?= $pager->links(); ?>
</div>



<?= $this->endSection(); ?>