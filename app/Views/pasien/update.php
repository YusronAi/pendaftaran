<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div class="container mt-90">
    <form method="post" action="/update-pasien/<?= $pasien['id_pasien']; ?>" class="row row-cols-lg-auto g-3 align-items-center">
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="input-group-text">No RM</div>
                <input type="hidden" name="id_pasien" class="form-control" value="<?= $pasien['id_pasien']; ?>" />
                <input type="text" name="no_rm" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['no_rm']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="input-group-text">Nama Pasien</div>
                <input type="text" name="nama_pasien" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['nama_pasien']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="input-group-text">Tanggal Lahir</div>
                <input type="date" name="tanggal_lahir" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['tanggal_lahir']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="input-group-text">Umur</div>
                <input type="text" name="umur" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['umur']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="input-group-text">Alamat</div>
                <input type="text" name="alamat" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['alamat']; ?>" />
            </div>
        </div>

        <div class="col-12">
            <button data-mdb-ripple-init type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>