<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Invoice_model');
        $this->load->model('Peserta_model'); // Memuat model di dalam constructor
        $this->load->model('Program_model'); // Memuat model di dalam constructor
    }

    public function peserta_invoice($id_siswa)
    {
        $data['title'] = 'Riwayat Pembayaran';
        $data['peserta'] = $this->Peserta_model->get_peserta_by_id($id_siswa);
        $data['invoice'] = $this->Peserta_model->get_invoice_by_id($id_siswa);
        $data['invoices'] = $this->Invoice_model->get_invoices_by_id_magang($id_siswa);
        // $data['invoices'] = $this->Invoice_model->get_data('tb_invoice')->result();
        $data['id_siswa'] = $id_siswa; // Meneruskan $id_siswa ke view

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('peserta/invoice', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_invoice($id_siswa)
    {
        $data['title'] = 'Tambah Invoice';
        $data['peserta'] = $this->Peserta_model->get_peserta_by_id($id_siswa);
        $data['programs'] = $this->Program_model->getAllPrograms();

        if (!$data['peserta']) {
            // Handle jika data peserta tidak ditemukan
            // Contoh: redirect ke halaman error atau menampilkan pesan error
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('peserta/tambah_invoice', $data); // Menyertakan data peserta magang ke view
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $this->form_validation->set_rules('id_siswa', 'ID Magang', 'required');
        $this->form_validation->set_rules('nis', 'NIP', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('program_nama', 'Nama Program', 'required');
        // Tambahkan aturan validasi lainnya sesuai kebutuhan

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembali ke halaman tambah_invoice dengan menampilkan pesan error
            $this->tambah_invoice($this->input->post('id_siswa'));
        } else {
            // Jika validasi berhasil, tambahkan data ke database
            $data = array(
                'id_siswa'          => $this->input->post('id_siswa'),
                'nis'               => $this->input->post('nis'),
                'nama_siswa'        => $this->input->post('nama_siswa'),
                'alamat'            => $this->input->post('alamat'),
                'no_hp'             => $this->input->post('no_hp'),
                'email'             => $this->input->post('email'),
                'program_nama'      => $this->input->post('program_nama'),
                'program_nama1'     => $this->input->post('program_nama1'),
                'program_nama2'     => $this->input->post('program_nama2'),
                'program_harga'     => $this->input->post('program_harga'), // Sesuaikan dengan nama input yang digunakan di form HTML
                'program_harga1'    => $this->input->post('program_harga1'), // Sesuaikan dengan nama input yang digunakan di form HTML
                'program_harga2'    => $this->input->post('program_harga2'), // Sesuaikan dengan nama input yang digunakan di form HTML
            );

            // Panggil model untuk menyimpan data
            $this->Invoice_model->insert_data($data, 'tb_invoice');

            // Set pesan sukses menggunakan session
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           <strong>Sukses!</strong> Data berhasil ditambahkan.
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>');

            // Redirect ke halaman invoice setelah menambahkan data
            redirect('peserta/invoice/' . $this->input->post('id_siswa'));
        }
    }

    public function fungsi_get_data_program()
    {
        $program_nama = $this->input->post('program_nama');
        $data = $this->Program_model->getDataProgram($program_nama);
        echo json_encode($data);
    }

    // public function view_invoice($id_siswa)
    // {
    //     // Mendapatkan data invoice dari model berdasarkan $id_siswa
    //     $data['invoice_data'] = $this->Invoice_model->get_invoice_data($id_siswa);
    //     $data['peserta'] = $this->Peserta_model->get_peserta_by_id($id_siswa);
    //     $data['invoice'] = $this->Peserta_model->get_invoice($id_siswa);
    //     // Load view 'invoice_view' dan passing data invoice
    //     $this->load->view('peserta/invoice_view', $data);
    // }
    
    public function view_invoice($invoice_id)
    {
        // Mendapatkan data invoice dari model berdasarkan $id_siswa
        $data['invoice'] = $this->Invoice_model->get_invoice_by_id($invoice_id);
        $data['programs'] = $this->Program_model->getAllPrograms();
        $data['invoice_id'] = $invoice_id; // Pastikan $invoice_id didefinisikan
        // Load view 'invoice_view' dan passing data invoice
        $this->load->view('peserta/invoice_view', $data);
    }

    public function view_uang($invoice_id)
    {
        $data['title'] = 'revisiinvoice';
        $data['invoice'] = $this->Invoice_model->get_invoice_by_id($invoice_id);
        $data['programs'] = $this->Program_model->getAllPrograms();
        $data['invoice_id'] = $invoice_id; // Pastikan $invoice_id didefinisikan

        if (!$data['invoice']) {
            // Handle jika data invoice tidak ditemukan
            // Contoh: redirect ke halaman error atau menampilkan pesan error
        }

        $this->load->view('peserta/view_uang', $data); // Menyertakan data invoice ke view
      
    }

    public function edit_invoice($invoice_id)
    {
        $data['title'] = 'Tambah Invoice';
        $data['invoice'] = $this->Invoice_model->get_invoice_by_id($invoice_id);
        $data['programs'] = $this->Program_model->getAllPrograms();
        $data['invoice_id'] = $invoice_id; // Pastikan $invoice_id didefinisikan

        if (!$data['invoice']) {
            // Handle jika data invoice tidak ditemukan
            // Contoh: redirect ke halaman error atau menampilkan pesan error
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('peserta/edit_invoice', $data); // Menyertakan data invoice ke view
        $this->load->view('templates/footer');
    }

    public function edit_aksi($invoice_id)
    {
        // Ambil data dari form edit invoice
        $data = array(
            'id_siswa'     => $this->input->post('id_siswa'),
            'nis'    => $this->input->post('nis'),
            'nama_siswa'   => $this->input->post('nama_siswa'),
            'alamat' => $this->input->post('alamat'),
            'no_hp'   => $this->input->post('no_hp'),
            'email'  => $this->input->post('email'),
            'program_nama'  => $this->input->post('program_nama'),
            'program_nama1'  => $this->input->post('program_nama1'),
            'program_nama2'  => $this->input->post('program_nama2'),
            'program_harga' => $this->input->post('program_harga'),
            'program_harga1' => $this->input->post('program_harga1'),
            'program_harga2' => $this->input->post('program_harga2')
        );

        // Simpan perubahan data invoice ke dalam database
        $this->Invoice_model->edit_invoice($invoice_id, $data);

        // Ambil id_magang dari data invoice yang baru diedit
        $invoice = $this->Invoice_model->get_invoice_by_id($invoice_id);
        $id_siswa = $invoice->id_siswa;

        // Set pesan sukses menggunakan session
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Data berhasil diubah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        // Redirect kembali ke halaman peserta/invoice/ dengan mengirimkan id_siswa
        redirect('peserta/invoice/' . $id_siswa);
    }

    public function delete($id)
    {
        $where = array('invoice_id' => $id);

        // Hapus data dari database
        $this->Invoice_model->delete($where, 'tb_invoice');

        // Set pesan sukses menggunakan session
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Data berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        // Ambil id_magang dari input post atau url
        $id_siswa = $this->input->get('id_siswa');

        // Jika id_siswa tidak tersedia di input post, coba ambil dari input get
        if (!$id_siswa) {
            $id_siswa = $this->input->get('id_siswa');
        }

        // Redirect kembali ke halaman peserta/invoice dengan mengirimkan id_siswa
        redirect('peserta/invoice/' . $id_siswa);
    }

    public function invoice_view($invoice_id)
    {
        // Mendapatkan data invoice dari model berdasarkan $invoice_id
        $data['invoice_data'] = $this->Invoice_model->get_invoice_data_by_id($invoice_id);
        // Mengirim invoice_id ke view
        $data['invoice_id'] = $invoice_id;
        // Load view 'invoice_view' dan passing data invoice
        $this->load->view('peserta/invoice_view', $data);
    }
}
