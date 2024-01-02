<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div class="container mt-90">
    <form class="pt-60" method="post" action="/save-dokter">
    <?= csrf_field(); ?>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example3">Nama Dokter</label>
            <input type="text" name="nama_dokter" id="form6Example3" class="form-control" />
        </div>

        <!-- Text input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example1">Alamat Dokter</label>
            <input type="text" name="alamat_dokter" id="form6Example1" class="form-control" />
        </div>

        <!-- Text input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example4">Telephone</label>
            <input type="text" name="telephone" id="form6Example4" class="form-control" />
        </div>

        <!-- Email input -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example5">Tarif</label>
            <input type="number" name="tarif" id="form6Example5" class="form-control" />
        </div>

        <!-- Submit button -->
        <div class="d-flex justify-content-center"><button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Save</button></div>
    </form>
    </form>
</div>

<style>
    .form-control  {
        background-color: pink;
    }
</style>
<?= $this->endSection(); ?>