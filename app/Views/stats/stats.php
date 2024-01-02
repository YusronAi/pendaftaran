<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid">
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success mb-3 text-center" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
            <div class="container search mb-3">
                <form action="" method="post">
                    <input type="text" name="keyword" style="background-color: pink; width: 100%; border-radius: 5px; text-align : center;" placeholder="Nama Pasien">
                </form>
            </div>
            <tr style="text-align: center;">
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Nama Dokter</th>
                <th>Poliklinik</th>
                <th>Kasus</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($daftar as $item) : ?>
                <tr style="text-align: center;">
                    <td><?= $i; ?></td>
                    <td><?= $item['nama_pasien']; ?></td>
                    <td><?= $item['nama_dokter']; ?></td>
                    <td><?= $item['nama_poli']; ?></td>
                    <td><?= $item['kasus']; ?></td>
                    <td><a href="/cetak/<?= $item['id_daftar']; ?>"><button class="btn btn-success m-1">Cetak</button></a>
                    <a href="/hapus-daftar/<?= $item['id_daftar']; ?>"><button class="btn btn-danger m-1">Hapus</button></a>
                    <a href="/edit-daftar/<?= $item['id_daftar']; ?>"><button class="btn btn-success m-1">Edit</button></a></td>
                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>
<?= $this->endSection(); ?>