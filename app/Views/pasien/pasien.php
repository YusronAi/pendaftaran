<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
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
                <th class="th-sm">Nama Pasien
                <th class="th-sm">No RM</th>

                </th>
                <th class="th-sm">Tanggal Lahir

                </th>
                <th class="th-sm">Umur

                </th>
                <th class="th-sm">Alamat

                </th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($pasien as $item) : ?>
                <tr style="text-align: center;">
                    <td><?= $i; ?></td>
                    <td><?= $item['nama_pasien']; ?></td>
                    <td><?= $item['no_rm']; ?></td>
                    <td><?= $item['tanggal_lahir']; ?></td>
                    <td><?= $item['umur']; ?></td>
                    <td><?= $item['alamat']; ?></td>
                    <td><a href="/ubah-pasien/<?= $item['id_pasien']; ?>"><button class="btn btn-success">Edit</button></a> <a href="/hapus-pasien/<?= $item['id_pasien']; ?>"><button class="btn btn-danger">Delete</button></a></td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>
    </table>

</div>



<?= $this->endSection(); ?>