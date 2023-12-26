<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div class="container mt-90">
    <form method="post" action="/update-dokter/<?= $dokter['id_dokter']; ?>" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="input-group-text">Nama Dokter</div>
                <input type="hidden" name="id_dokter" class="form-control" value="<?= $dokter['id_dokter']; ?>" />
                <input type="text" name="nama_dokter" class="form-control" id="inlineFormInputGroupUsername" value="<?= $dokter['nama_dokter']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="input-group-text">Alamat</div>
                <input type="text" name="alamat_dokter" class="form-control" id="inlineFormInputGroupUsername" value="<?= $dokter['alamat_dokter']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="input-group-text">Telephone</div>
                <input type="number" name="telephone" class="form-control" id="inlineFormInputGroupUsername" value="<?= $dokter['telephone']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="input-group-text">Tarif</div>
                <input type="text" name="tarif" class="form-control" id="inlineFormInputGroupUsername" value="<?= $dokter['tarif']; ?>" />
            </div>
        </div>

        <div class="col-12">
            <button data-mdb-ripple-init type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>