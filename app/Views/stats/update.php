<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div class="container mt-90">
    <form class="pt-60" method="post" action="/update-daftar/<?= $daftar['id_daftar']; ?>">
        <?= csrf_field(); ?>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example3">Tanggal Daftar</label>
            <input type="date" name="tgl_daftar" id="form6Example3" class="form-control" value="<?= $daftar['tgl_daftar']; ?>" />
        </div>

        <!-- Text input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example1">Nama Pasien</label>
            <select name="id_pasien">
                <?php $i = 1; ?>
                <?php foreach ($pasien as $item) : ?>
                    <option value="<?= $item['id_pasien']; ?>"><?= $item['nama_pasien']; ?></option>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </select>

        </div>

        <!-- Text input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example4">Poliklinik</label>
            <select name="id_poli" id="">
            <?php $i = 1; ?>
                <?php foreach ($poli as $item) : ?>
                    <option value="<?= $item['id_poli']; ?>"><?= $item['nama_poli']; ?></option>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Email input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example5">Nama Dokter</label>
            <select name="id_dokter" id="">
            <?php $i = 1; ?>
                <?php foreach ($dokter as $item) : ?>
                    <option value="<?= $item['id_dokter']; ?>"><?= $item['nama_dokter']; ?></option>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Number input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example6">Kasus</label>
            <input type="text" name="kasus" id="form6Example6" class="form-control" value="<?= $daftar['kasus']; ?>" />
        </div>

        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example6">Biaya</label>
            <input type="number" name="biaya" id="form6Example6" class="form-control" value="<?= $daftar['biaya']; ?>" />
        </div>

        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Ubah</button>
    </form>
</div>
<?= $this->endSection(); ?>