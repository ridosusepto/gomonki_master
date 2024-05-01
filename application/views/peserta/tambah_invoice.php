<!-- Main content -->
<form id="invoiceForm" method="post" action="<?= base_url('invoice/tambah_aksi'); ?>">

    <section class="content ">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Data Peserta</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_siswa">Id Magang</label>
                                <input type="text" class="form-control" name="id_siswa" id="id_siswa" value="<?= isset($peserta->id_siswa) ? $peserta->id_siswa : '' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nis">Nis</label>
                                <input type="text" class="form-control" name="nis" id="nis" value="<?= isset($peserta->nis) ? $peserta->nis : '' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_siswa">Nama</label>
                                <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" value="<?= isset($peserta->nama_siswa) ? $peserta->nama_siswa : '' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="alamat" value="<?= isset($peserta->alamat) ? $peserta->alamat : '' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Telepon</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" value="<?= isset($peserta->no_hp) ? $peserta->no_hp : '' ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="<?= isset($peserta->email) ? $peserta->email : '' ?>" readonly>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <!-- </form> -->
                    </div>
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- Form Element sizes -->
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Transaksi</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="program_nama">Nama Program</label>
                                        <select class="form-control" id="program_nama" name="program_nama">
                                            <?php foreach ($programs as $program) : ?>
                                                <option value="<?php echo $program['program_nama']; ?>"><?php echo $program['program_nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="program_harga">Harga</label>
                                        <input type="text" class="form-control" name="program_harga" id="program_harga">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="program_nama1">Nama Program <span class="text-muted font-italic">(opsional)</span></label>
                                        <select class="form-control" id="program_nama1" name="program_nama1">
                                            <?php foreach ($programs as $program) : ?>
                                                <option value="<?php echo $program['program_nama']; ?>"><?php echo $program['program_nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="program_harga1">Harga</label>
                                        <input type="text" class="form-control" name="program_harga1" id="program_harga1">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="program_nama2">Nama Program <span class="text-muted font-italic">(opsional)</span></label>
                                        <select class="form-control" id="program_nama2" name="program_nama2">
                                            <?php foreach ($programs as $program) : ?>
                                                <option value="<?php echo $program['program_nama']; ?>"><?php echo $program['program_nama']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="program_harga2">Harga</label>
                                        <input type="text" class="form-control" name="program_harga2" id="program_harga2">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-body -->
                    </div>

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Metode Pembayaran</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-university mr-1"></i> Bank</strong>
                            <p class="text-muted">BCA, Rek: 3920753638</p>
                            <hr>

                            <strong><i class="fas fa-user mr-1"></i> Atas Nama</strong>
                            <p class="text-muted">Yudhatama Fajar Nugroho</p>
                            <hr>

                            <strong><i class="far fa-sticky-note mr-1"></i> Notes</strong>
                            <p class="text-muted">Silakan lakukan pembayaran sesuai dengan instruksi di atas. Mohon konfirmasi setelah melakukan pembayaran. Terima kasih.</p>
                        </div>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary px-5 mb-5">Submit</button>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#program_nama').change(function() {
            var nama = $(this).val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("invoice/fungsi_get_data_program"); ?>',
                data: {
                    program_nama: nama
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#program_harga').val(data.program_harga);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#program_nama1').change(function() {
            var nama = $(this).val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("invoice/fungsi_get_data_program"); ?>',
                data: {
                    program_nama: nama
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#program_harga1').val(data.program_harga);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#program_nama2').change(function() {
            var nama = $(this).val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url("invoice/fungsi_get_data_program"); ?>',
                data: {
                    program_nama: nama
                },
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#program_harga2').val(data.program_harga);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>