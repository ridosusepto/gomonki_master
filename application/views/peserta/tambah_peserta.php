<form class="needs-validation" action="<?= base_url('peserta/tambah_aksi') ?>" method="POST">
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationTooltip14">NIS</label>
            <input type="text" class="form-control" id="validationTooltip14" name="nis" required>
            <?= form_error('nis', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationTooltip01">Nama</label>
            <input type="text" class="form-control" id="validationTooltip01" name="nama_siswa" required>
            <?= form_error('nama_siswa', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationTooltip02">Email</label>
            <input type="text" class="form-control" id="validationTooltip02" name="email" required>
            <?= form_error('email', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationTooltip03">No Telepon</label>
            <input type="text" class="form-control" id="validationTooltip03" name="no_hp" required>
            <?= form_error('no_hp', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationTooltip04">Alamat</label>
            <input type="text" class="form-control" id="validationTooltip04" name="alamat" required>
            <?= form_error('alamat', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationTooltip05">Tanggal Lahis</label>
            <input type="text" class="form-control" id="validationTooltip05" name="tanggal_lahir" required>
            <?= form_error('tanggal_lahir', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="magang_agama">Agama</label>
            <select name="magang_agama" class="form-control">
                <option value="" disabled selected>Pilih Agama</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen Protestan</option>
                <option value="Katolik">Kristen Katolik</option>
                <option value="Katolik">Hindu</option>
                <option value="Katolik">Buddha</option>
                <option value="Katolik">Khonghucu</option>
            </select>
            <?= form_error('magang_agama', '<div class="text-small text-danger">', '</div>'); ?>
        </div>
        <div class="col-md-6 mb-3">
            <label for="jenis_kelamin">Gender</label>
            <select name="jenis_kelamin" class="form-control">
                <option value="" disabled selected>Pilih Gender</option>
                <option value="Pria">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <?= form_error('jenis_kelamin', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationTooltip08">Kota</label>
            <input type="text" class="form-control" id="validationTooltip08" name="magang_kota" required>
            <?= form_error('magang_kota', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationTooltip09">Kode Pos</label>
            <input type="text" class="form-control" id="validationTooltip09" name="magang_kodepos" required>
            <?= form_error('magang_kodepos', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationTooltip10">KTP</label>
            <input type="text" class="form-control" id="validationTooltip10" name="magang_ktp" required>
            <?= form_error('magang_ktp', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
        <div class="col-md-6 mb-3">
            <label for="validationTooltip11">Portofolio</label>
            <input type="text" class="form-control" id="validationTooltip11" name="magang_portofolio" required>
            <?= form_error('magang_portofolio', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="validationTooltip12">Pembayaran</label>
            <input type="text" class="form-control" id="validationTooltip12" name="magang_payment" required>
            <?= form_error('magang_payment', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
        <div class="col-md-6 mb-3">
            <label for="status_nama">Status</label>
            <select class="form-control" id="status_nama" name="status_nama" required>
                <option value="" disabled selected>Pilih Status</option>
                <?php foreach ($tb_status as $status) : ?>
                    <option value="<?= $status->status_nama ?>"><?= $status->status_nama ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('status_nama', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <label for="course_nama">Nama Course</label>
            <select class="form-control" id="course_nama" name="course_nama" required>
                <option value="" disabled selected>Pilih Status</option>
                <?php foreach ($tb_course as $course) : ?>
                    <option value="<?= $course->course_nama ?>"><?= $course->course_nama ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('course_nama', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
        <div class="col-md-6 mb-3">
            <label for="kelaskategori">Kategori & Kelas</label>
            <select class="form-control" id="kelaskategori" name="kelaskategori" required>
                <option value="" disabled selected>Pilih Kelas & Kategori</option>
                <?php foreach ($tb_kelas as $kelaskategori) : ?>
                    <option value="<?= $kelaskategori->course_nama ?>"><?= $kelaskategori->course_nama . ' | ' . ($kelaskategori->kelas_nama ?? '') ?></option>
                <?php endforeach; ?>
            </select>
            <?= form_error('kelaskategori', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>

        <div class="col-md-6 mb-3">
            <label for="validationTooltip11">Course Code</label>
            <input type="text" class="form-control" id="validationTooltip11" name="course_code" required>
            <?= form_error('course_code', '<div class="invalid-tooltip">', '</div>'); ?>
        </div>
    </div>
    <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>Submit form</button>
</form>


</div>