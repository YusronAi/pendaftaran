<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div class="container mt-90">
    <form class="pt-60" method="post" action="/save-poli">
    <?= csrf_field(); ?>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example3">Nama Poliklinik</label>
            <input type="text" name="nama_poli" id="form6Example3" class="form-control" />
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