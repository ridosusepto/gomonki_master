<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/invoice.css'); ?>" />
<!--Author      : @arboshiki-->
<div id="invoice">

    <div class="toolbar hidden-print">
        <hr>
    </div>
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                <div class="row">
                    <div class="col">
                        <a target="_blank" href="https://manimonki.studio">
                            <img src="data:image/png;base64,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" data-holder-rendered="true" />
                        </a>
                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            MANIMONKI
                            </a>
                        </h2>
                        <div>Jl. Satrio Wibowo Selatan No. 39A Purwosari, Surakarta 57142</div>
                        <div>Telepon: 0896-6274-4448</div>
                        <div>Email: manimonki.solo@gmail.com</div>
                    </div>
                </div>
            </header>
            <main>
                <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Kepada Yth.</div>
                        <h2 class="to"><?php echo $invoice->nama_siswa; ?></h2>
                        <div class="address"><?php echo $invoice->alamat; ?></div>
                        <div class="address"><?php echo $invoice->no_hp; ?></div>
                        <div class="email">Email: <?php echo $invoice->email; ?></a></div>
                    </div>
                    <div class="col invoice-details">
                        <h1 class="invoice-id">INVOICE 3-2-1</h1>
                        <div class="">Bulan : <?php echo $invoice->invoice_created; ?></div>
                        <!-- <div class="date">Tenggat: <?php echo $invoice->tenggat_pembayaran; ?></div> -->
                    </div>
                </div>
                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th class="text-left">Deskripsi</th>
                            <th class="text-right">Jumlah</th>
                            <th class="text-right">Harga</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="" style="font-size: 19px;">1</td>

                            <td class="text-left">
                                <a><?php echo $invoice->program_nama; ?> </a>
                            </td>
                            <td class="unit" style="color: black;">1</td>
                            <td class="qty"><?php echo $invoice->program_harga; ?></td>
                            <td class="total" style="font-size: 19px; font-weight: bold; color: black;"><?php echo $invoice->program_harga; ?></td>
                        </tr>
                        <tr>
                            <td class="" style="font-size: 19px;">
                                <?php if (!empty($invoice->program_nama1)) {
                                    echo 2; // Jika ada datanya, tampilkan angka 1
                                } else {
                                    echo ''; // Jika tidak ada datanya, biarkan hasilnya kosong
                                }
                                ?>
                            </td>
                            <td class="text-left">
                                <a><?php echo $invoice->program_nama1; ?></a>
                            </td>
                            <td class="unit" style="color: black;"><?php
                                                                    if (!empty($invoice->program_nama1)) {
                                                                        echo 2; // Jika ada datanya, tampilkan angka 1
                                                                    } else {
                                                                        echo ''; // Jika tidak ada datanya, biarkan hasilnya kosong
                                                                    }
                                                                    ?>
                            </td>
                            <td class="qty"><?php echo $invoice->program_harga1; ?></td>
                            <td class="total" style="font-size: 19px; font-weight: bold; color: black;"><?php echo $invoice->program_harga1; ?></td>
                        </tr>
                        <tr>
                            <td class="" style="font-size: 19px;"><?php
                                                                    if (!empty($invoice->program_nama2)) {
                                                                        echo 3; // Jika ada datanya, tampilkan angka 1
                                                                    } else {
                                                                        echo ''; // Jika tidak ada datanya, biarkan hasilnya kosong
                                                                    }
                                                                    ?>
                            </td>
                            <td class="text-left">
                                <a><?php echo $invoice->program_nama2; ?></a>
                            </td>
                            <td class="unit" style="color: black;"><?php
                                                                    if (!empty($invoice->program_nama2)) {
                                                                        echo 1; // Jika ada datanya, tampilkan angka 1
                                                                    } else {
                                                                        echo ''; // Jika tidak ada datanya, biarkan hasilnya kosong
                                                                    }
                                                                    ?>
                            </td>
                            <td class="qty"><?php
                                            if (!empty($invoice->program_harga2)) {
                                                echo $invoice->program_harga2; // Jika ada datanya, tampilkan angka 1
                                            } else {
                                                echo ''; // Jika tidak ada datanya, biarkan hasilnya kosong
                                            }
                                            ?>
                            </td>
                            <td class="total" style="font-size: 19px; font-weight: bold; color: black;"><?php
                                                                                                        if (!empty($invoice->program_harga2)) {
                                                                                                            echo $invoice->program_harga2; // Jika ada datanya, tampilkan angka 1
                                                                                                        } else {
                                                                                                            echo ''; // Jika tidak ada datanya, biarkan hasilnya kosong
                                                                                                        }
                                                                                                        ?>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" style="font-size: 19px; font-weight: bold;">Jumlah Yang Harus Dibayar</td>
                            <td style="font-size: 19px;"><?php
                                                            $total_harga = 0;

                                                            // Cek apakah $invoice->program_harga ada dan konversi ke integer
                                                            if (isset($invoice->program_harga)) {
                                                                $total_harga += intval($invoice->program_harga);

                                                                // Cek apakah $invoice->program_harga1 ada dan konversi ke integer
                                                                if (isset($invoice->program_harga1)) {
                                                                    $total_harga += intval($invoice->program_harga1);
                                                                }

                                                                // Cek apakah $invoice->program_harga2 ada dan konversi ke integer
                                                                if (isset($invoice->program_harga2)) {
                                                                    $total_harga += intval($invoice->program_harga2);
                                                                }
                                                            }

                                                            echo $total_harga;
                                                            ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <p>‎ </p>

                <p class="h2">Metode Pembayaran</p>
                <p class="h6">Bank: BCA</p>
                <p class="h6">No.Rek: 346579</p>
                <p class="h6">Atas Nama: Yudhatama Fajar Nugroho</p>
                <p>‎ </p>
                <p>‎ </p>


                <div class="h5">Terima Kasih </div>

                <div class="notices" style="text-align: right;">
                    <div class="h6 gap: 5px;">Nusaibah:</div>
                    <p>‎</p>
                    <p>‎</p>
                    <p>‎</p>
                    <div class="notice h6">Staff Bagian Permagangan</div>
                </div>

            </main>
            <footer>
                Invoice MANIMONKI
            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>