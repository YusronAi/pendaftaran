<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div class="container mt-90">
    <form class="pt-60" method="post" action="/update-poli/<?= $poli['id_poli']; ?>">
    <?= csrf_field(); ?>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div data-mdb-input-init class="form-outline mb-4">
            <label class="form-label" for="form6Example3">Nama Poliklinik</label>
            <input type="hidden" name="id_poli" id="form6Example3" class="form-control" value="<?= $poli['id_poli']; ?>" />
            <input type="text" name="nama_poli" id="form6Example3" class="form-control" value="<?= $poli['nama_poli']; ?>" />
        </div>
        
        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Input</button>
    </form>
</div>
<?= $this->endSection(); ?>