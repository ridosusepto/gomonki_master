<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kelas</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('pelatihan/tambah_kelas') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Kelas </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Kelas</th>
                                    <th>Kategori</th>
                                    <th style="width: 40px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $no = 1;
                                    foreach ($kelas as $ssw) : ?>
                                        <td><?= $no++ ?></td>
                                        <td><?= $ssw->kelas_nama ?></td>
                                        <td><?= $ssw->course_nama ?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button data-toggle="modal" data-target="#editkelas<?= $ssw->kelas_id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                                <!-- <a href="<?= base_url('pelatihan/edit_kelas/' . $ssw->kelas_id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> -->
                                                <a href="<?= base_url('pelatihan/deleteKelas/' . $ssw->kelas_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                            </div>
                                        </td>
                                </tr>
                            <?php endforeach ?>
                            </tr>
                            </tbody>
                        </table>
                        <?php if ($this->session->flashdata('flash')) : ?>
                            <div class="row mt-1">
                                <div class="col-md-6">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Data kelas <strong>berhasil</strong> <?=
                                                                                $this->session->flashdata('flash');
                                                                                ?>.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kategori</h3>

                        <div class="card-tools">
                            <button data-toggle="modal" data-target="#tambah" class="btn btn-primary btn-sm" title="Tambah Pelatihan">
                                <i class="fas fa-plus"></i> Tambah Kategori
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-2 ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                    <th style="width: 40px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php $no = 1;
                                    foreach ($pelatihan as $ssw) : ?>
                                <tr class="text-center highlight-row" data-href="<?= base_url('course/detail/' . $ssw->pelatihan_id) ?>">
                                    <td><?= $no++ ?></td>
                                    <td><?= $ssw->course_nama ?></td>
                                    <td><?= $ssw->pelatihan_ket ?></td>
                                    <td>
                                        <div class="btn-group">
                                            <button data-toggle="modal" data-target="#editp<?= $ssw->pelatihan_id ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                                            <a href="<?= base_url('pelatihan/delete/' . $ssw->pelatihan_id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin menghapus data ini')" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                            <!-- <a href="<?= base_url('pelatihan/info/' . rawurlencode($ssw->course_code)) ?>" class="btn btn-info btn-sm"><i class="fas fa-info-circle"></i> Info</a> -->
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</section>

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); border: none; border-radius: 10px;">
            <div class="modal-header" style="background-color: #007bff; color: #fff; border-radius: 10px 10px 0 0;">
                <h5 class="modal-title" id="exampleModalLabel">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Data Kategori
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="<?= base_url('pelatihan/tambah_aksi/') ?>" method="POST">
                    <div class="col-md-12">
                        <label for="courseNama" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="courseNama" name="course_nama" required>
                        <?= form_error('course_nama', '<div class="invalid-tooltip">', '</div>'); ?>
                    </div>
                    <div class="col-md-12">
                        <label for="pelatihanKet" class="form-label">Kategori Keterangan</label>
                        <input type="text" class="form-control" id="pelatihanKet" name="pelatihan_ket" required>
                        <?= form_error('pelatihan_ket', '<div class="invalid-tooltip">', '</div>'); ?>
                    </div>
                    <div class="col-md-12 mt-3">
                        <button class="btn btn-primary" type="submit" style="width: 100%;">
                            <i class="fas fa-save me-2"></i> Submit Form
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($pelatihan as $ssw) : ?>
    <div class="modal fade" id="editp<?= $ssw->pelatihan_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); border: none; border-radius: 10px;">
                <div class="modal-header" style="background-color: #007bff; color: #fff; border-radius: 10px 10px 0 0;">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <i class="fas fa-edit me-2"></i> Edit Data Kategori
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: #fff;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pelatihan/edit_aksi/' . $ssw->pelatihan_id) ?>" method="POST">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="courseNama">Nama Pelatihan</label>
                                    <input type="text" name="course_nama" class="form-control" value="<?= $ssw->course_nama ?>">
                                    <?= form_error('course_nama', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pelatihan_ket">Pelatihan Keterangan</label>
                                    <input type="text" name="pelatihan_ket" class="form-control" value="<?= $ssw->pelatihan_ket ?>">
                                    <?= form_error('pelatihan_ket', '<div class="text-small text-danger">', '</div>'); ?>
                                </div>
                            </div>

                            <!-- Add more fields as needed -->
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-2"></i> Simpan</button>
                            <button type="reset" class="btn btn-secondary"><i class="fas fa-trash me-2"></i> Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php foreach ($kelas as $ssw) : ?>
    <div class="modal fade" id="editkelas<?= $ssw->kelas_id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pelatihan/editkelas_aksi/' . $ssw->kelas_id) ?>" method="POST">
                        <div class="form-group">
                            <label for="kelas_nama">Nama Kelas</label>
                            <input type="text" name="kelas_nama" class="form-control" value="<?= $ssw->kelas_nama ?>">
                        </div>
                        <div class="form-group">
                            <label for="course_nama">Kategori</label>
                            <select name="course_nama" class="form-control">
                                <option value="<?= $ssw->course_nama ?>"><?= $ssw->course_nama ?></option> <!-- Menampilkan status awal -->
                                <?php foreach ($tb_pelatihan as $course) : ?>
                                    <option value="<?= $course->course_nama ?>"><?= $course->course_nama ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>




</div>
<script>
    function redirectToInfo(courseName) {
        var url = '<?= base_url('pelatihan/info/') ?>' + courseName;
        window.location.href = url;
    }
</script>