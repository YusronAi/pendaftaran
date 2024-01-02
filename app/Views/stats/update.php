<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div class="container mt-90">
    <form class="pt-60" method="post" action="/update-daftar/<?= $daftar['id_daftar']; ?>">
        <?= csrf_field(); ?>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example3">Tanggal Daftar</label>
            <input type="date" name="tgl_daftar" id="form6Example3" class="form-control" value="<?= $daftar['tgl_daftar']; ?>" />
        </div>

        <!-- Text input -->
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example1">Nama Pasien</label>
            <select class="form-control" name="id_pasien">
                <?php $i = 1; ?>
                <?php foreach ($pasien as $item) : ?>
                    <option value="<?= $item['id_pasien']; ?>"><?= $item['nama_pasien']; ?></option>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </select>

        </div>

        <!-- Text input -->
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example4">Poliklinik</label>
            <select class="form-control" name="id_poli" id="">
            <?php $i = 1; ?>
                <?php foreach ($poli as $item) : ?>
                    <option value="<?= $item['id_poli']; ?>"><?= $item['nama_poli']; ?></option>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Email input -->
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example5">Nama Dokter</label>
            <select class="form-control" name="id_dokter" id="">
            <?php $i = 1; ?>
                <?php foreach ($dokter as $item) : ?>
                    <option value="<?= $item['id_dokter']; ?>"><?= $item['nama_dokter']; ?></option>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Number input -->
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example6">Kasus</label>
            <input type="text" name="kasus" id="form6Example6" class="form-control" value="<?= $daftar['kasus']; ?>" />
        </div>

        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example6">Biaya</label>
            <input type="number" name="biaya" id="form6Example6" class="form-control" value="<?= $daftar['biaya']; ?>" />
        </div>

        <!-- Submit button -->
        <div class="d-flex justify-content-center"><button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Save</button></div>
    </form>
    </form>
</div>

<style>
    .form-control  {
        background-color: pink;
        margin-bottom: 12px;
    }

    .input-group-text {
        width: 25%;
        margin-bottom: 12px;
    }
</style>
<?= $this->endSection(); ?>