<?= $this->extend('template/main'); ?>

<?= $this->section('content'); ?>
<div class="container mt-90">
<h1><?= $h1; ?></h1>
    <form class="pt-60" method="post" action="/save-pasien">
    <?= csrf_field(); ?>
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example3">Nama Pasien</label>
            <input type="text" name="nama_pasien" id="form6Example3" class="form-control" />
        </div>

        <!-- Text input -->
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example1">Alamat Pasien</label>
            <input type="text" name="alamat" id="form6Example1" class="form-control" />
            <input type="hidden" name="no_rm" id="form6Example4" class="form-control" value="<?= $time; ?>" />
        </div>

        <!-- Text input -->
        <!-- <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example4">No RM</label>
            
        </div> -->

        <!-- Email input -->
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example5">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" id="form6Example5" class="form-control" />
        </div>

        <!-- Number input -->
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example6">Umur</label>
            <input type="number" name="umur" id="form6Example6" class="form-control" />
        </div>
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example6">Tanggal Periksa</label>
            <input type="date" name="tgl_periksa" class="form-control" id="inlineFormInputGroupUsername"  />
        </div>
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example6">NIK</label>
            <input type="number" name="nik" class="form-control" id="inlineFormInputGroupUsername"  />
        </div>
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example6">Jenis Kelamin</label>
            <select class="form-control" name="jenis_kelamin" id="">
                    <option value="LK">LAKI LAKI</option>
                    <option value="PR">PEREMPUAN</option>
                </select>
        </div>
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example6">Telphone</label>
            <input type="number" name="telp" class="form-control" id="inlineFormInputGroupUsername" />
        </div>
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example6">Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" id="inlineFormInputGroupUsername"  />
        </div>
        <div data-mdb-input-init class="input-group">
            <label class="input-group-text" for="form6Example6">Agama</label>
            <input type="text" name="agama" class="form-control" id="inlineFormInputGroupUsername" />
        </div>

        <!-- Submit button -->
        <div class="d-flex justify-content-center"><button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Save</button></div>
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