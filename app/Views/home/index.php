<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div class="container mt-90">
    <form class="pt-60" method="post" action="/save-pasien">
    <?= csrf_field(); ?>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example3">Nama Pasien</label>
            <input type="text" name="nama_pasien" id="form6Example3" class="form-control" />
        </div>

        <!-- Text input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example1">Alamat Pasien</label>
            <input type="text" name="alamat" id="form6Example1" class="form-control" />
        </div>

        <!-- Text input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example4">No RM</label>
            <input type="text" name="no_rm" id="form6Example4" class="form-control" />
        </div>

        <!-- Email input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example5">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="form6Example5" class="form-control" />
        </div>

        <!-- Number input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example6">Umur</label>
            <input type="number" name="umur" id="form6Example6" class="form-control" />
        </div>

        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Input</button>
    </form>
</div>
<?= $this->endSection(); ?>