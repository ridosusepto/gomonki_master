</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note:</h5>
                    This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                </div>
                <!-- Main content -->
                <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> MANIMONKI.
                                <!-- <a href="<?= base_url('peserta/tambah') ?>" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Peserta </a> -->
                            </h4>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>Admin, Manimonki.</strong><br>
                                Jl. Satrio Wibowo Selatan No. 39A Purwosari<br>
                                Surakarta 57142<br>
                                Telepon: 0896-6274-4448<br>
                                Email: manimonki.solo@gmail.com
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <strong><?php echo $peserta->nama_siswa; ?></strong><br>
                                <?php echo $peserta->alamat; ?></strong><br>
                                <?php echo $peserta->no_hp; ?></strong><br>
                                <?php echo $peserta->email; ?></strong>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                            <b>Invoice <?php echo $peserta->id_siswa; ?></strong></b><br>
                            <br>
                            <b>Order ID:</b> 4F3S8J<br>
                            <b>Payment Due:</b> 2/22/2014<br>
                            <b>Account:</b> 968-34567
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <!-- Table row -->
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama</th>
                                        <th>Program</th>
                                        <th>Total</th>
                                        <th>Cetak</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php $no = 1;
                                foreach ($invoices as $ic) : ?>
                                    <tbody>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $ic->nis; ?></td>
                                            <td><?= $ic->nama_siswa; ?></td>
                                            <td>
                                                <div class="program-list">
                                                    <?php if (!empty($ic->program_nama)) : ?>
                                                        <div class="badge bg-primary"><?= $ic->program_nama; ?></div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($ic->program_nama1)) : ?>
                                                        <div class="badge bg-warning"><?= $ic->program_nama1; ?></div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($ic->program_nama2)) : ?>
                                                        <div class="badge bg-danger"><?= $ic->program_nama2; ?></div>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                            <td> <?php
                                                    // Menghitung jumlah total harga
                                                    $total_harga = intval($ic->program_harga) + intval($ic->program_harga1) + intval($ic->program_harga2);
                                                    echo $total_harga;
                                                    ?></td>
                                            <td>
                                                <!-- <button data-toggle="modal" data-target="#detail" class="btn btn-info btn-sm"><i class="fas fa-download"></i> PDF</button> -->
                                                <button onclick="printAndDownloadPDF('<?= base_url('invoice/view_invoice/' . $ic->invoice_id) ?>')" class="btn btn-info btn-sm"><i class="fas fa-download"></i> PDF</button>
                                                <a href="<?= base_url('invoice/view_invoice/' . $ic->invoice_id) ?>" class="btn btn-info btn-sm">Preview</a></button>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('invoice/edit_invoice/' . $ic->invoice_id) ?>" class="btn btn-warning btn-sm m-1"><i class="fas fa-edit"></i></a>
                                                <a href="<?= base_url('invoice/delete/' . $ic->invoice_id . '?id_siswa=' . $ic->id_siswa) ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Apakah anda yakin menghapus data ini')"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php endforeach ?>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-12">
                            <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                            <a href="<?= base_url('invoice/tambah_invoice/' . $id_siswa) ?>" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Invoice</a>
                        </div>
                    </div>
                </div>
                <!-- /.invoice -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<script>
    function printAndDownloadPDF(url) {
        // Membuka jendela baru untuk memuat URL PDF
        var newWindow = window.open(url, '_blank');
        // Menunggu jendela terbuka sebelum mencetak
        newWindow.onload = function() {
            // Mencetak dokumen
            newWindow.print();
            // Menutup jendela setelah pencetakan selesai
            setTimeout(function() {
                newWindow.close();
            }, 100);
        };
    }
</script>