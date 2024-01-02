<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div class="container mt-90">
    <form method="post" action="/update-pasien/<?= $pasien['id_pasien']; ?>" class="pt-60">
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="lable1 input-group-text">No RM</div>
                <input type="hidden" name="id_pasien" class="form-control" value="<?= $pasien['id_pasien']; ?>" />
                <input type="number" name="no_rm" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['no_rm']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="lable1 input-group-text">Nama Pasien</div>
                <input type="text" name="nama_pasien" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['nama_pasien']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="lable1 input-group-text">Tanggal Lahir</div>
                <input type="date" name="tanggal_lahir" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['tanggal_lahir']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="lable1 input-group-text">Umur</div>
                <input type="number" name="umur" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['umur']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="lable1 input-group-text">Alamat</div>
                <input type="text" name="alamat" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['alamat']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="lable1 input-group-text">Tanggal Periksa</div>
                <input type="date" name="tgl_periksa" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['tgl_periksa']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="lable1 input-group-text">NIK</div>
                <input type="number" name="nik" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['nik']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="lable1 input-group-text">jenis Kelamin</div>
                <select class="form-control" name="jenis_kelamin" id="">
                    <option value="LK">LAKI LAKI</option>
                    <option value="PR">PEREMPUAN</option>
                </select>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="lable1 input-group-text">Telphone</div>
                <input type="number" name="telp" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['telp']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="lable1 input-group-text">Pekerjaan</div>
                <input type="text" name="pekerjaan" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['pekerjaan']; ?>" />
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="input-group">
                <div class="lable1 input-group-text">Agama</div>
                <input type="text" name="agama" class="form-control" id="inlineFormInputGroupUsername" value="<?= $pasien['agama']; ?>" />
            </div>
        </div>

        <div class="d-flex justify-content-between"><a href="/pasien" class="btn btn-primary btn-block mb-4">Cancel</a><button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Save</button></div>
    </form>
    </form>
</div>

<style>
    .form-control {
        background-color: pink;
    }

    .lable1 {
        width: 25%;
    }
</style>
<?= $this->endSection(); ?>