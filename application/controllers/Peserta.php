<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Peserta_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Peserta';
        $data['peserta'] = $this->Peserta_model->get_data('tb_siswa')->result();
        $data['tb_status'] = $this->Peserta_model->get_data('tb_status')->result();
        $data['tb_course'] = $this->Peserta_model->get_data('tb_course')->result();
        $data['tb_kelas'] = $this->Peserta_model->get_data('tb_kelas')->result();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('peserta/peserta', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Peserta';
        $data['tb_status'] = $this->Peserta_model->get_data('tb_status')->result();
        $data['tb_course'] = $this->Peserta_model->get_data('tb_course')->result();
        $data['tb_kelas'] = $this->Peserta_model->get_data('tb_kelas')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('peserta/tambah_peserta');
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        // Validasi form
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke halaman tambah
            $data['tb_status'] = $this->Peserta_model->getStatusNama();
            $data['tb_course'] = $this->Peserta_model->getCourseNama(); // Mengambil NIP dari model
            $data['tb_kelas'] = $this->Peserta_model->getKelasNama(); // Mengambil NIP dari model
            $this->load->view('peserta/tambah_peserta', $data); // Ganti 'nama_view' dengan nama view yang sesuai

            $this->tambah();
        } else {
            // Jika validasi berhasil, tambahkan data ke database
            $data = array(
                'nis'               => $this->input->post('nis'),
                'nama_siswa'        => $this->input->post('nama_siswa'),
                'email'             => $this->input->post('email'),
                'no_hp'             => $this->input->post('no_hp'),
                'alamat'            => $this->input->post('alamat'),
                'status_nama'       => $this->input->post('status_nama'),
                'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                'magang_agama'      => $this->input->post('magang_agama'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'magang_kota'       => $this->input->post('magang_kota'),
                'magang_kodepos'    => $this->input->post('magang_kodepos'),
                'magang_ktp'        => $this->input->post('magang_ktp'),
                'magang_portofolio' => $this->input->post('magang_portofolio'),
                'magang_payment'    => $this->input->post('magang_payment'),
                'course_nama'       => $this->input->post('course_nama'),
                'kelaskategori'     => $this->input->post('kelaskategori'),
                'course_code'       => $this->input->post('course_code'),
            );

            // Panggil model untuk menyimpan data
            $this->Peserta_model->insert_data($data, 'tb_siswa');

            // Set pesan sukses menggunakan session
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
               <strong>Sukses!</strong> Data berhasil ditambahkan.
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>');

            // Redirect ke halaman peserta setelah menambahkan data
            redirect('peserta');
        }
    }
    public function edit_aksi($id_siswa)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $data['tb_status'] = $this->Peserta_model->getStatusNama();
            $data['tb_kelas'] = $this->Peserta_model->getKelasNama();
            $this->index();
        } else {
            $data = array(
                'id_siswa'          => $id_siswa,
                'nama_siswa'        => $this->input->post('nama_siswa'),
                'email'             => $this->input->post('email'),
                'no_hp'             => $this->input->post('no_hp'),
                'alamat'            => $this->input->post('alamat'),
                'status_nama'       => $this->input->post('status_nama'), // Perhatikan nama inputnya
                'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                'magang_agama'      => $this->input->post('magang_agama'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'magang_kota'       => $this->input->post('magang_kota'),
                'magang_kodepos'    => $this->input->post('magang_kodepos'),
                'magang_ktp'        => $this->input->post('magang_ktp'),
                'magang_portofolio' => $this->input->post('magang_portofolio'),
                'magang_payment'    => $this->input->post('magang_payment'),
                'course_nama'       => $this->input->post('course_nama'),
                'kelaskategori'     => $this->input->post('kelaskategori'),
                'course_code'       => $this->input->post('course_code'),
            );

            $this->Peserta_model->update_data($data, 'tb_siswa');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Data berhasil diubah.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
            redirect('peserta');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_siswa', 'Nama Magang', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('email', 'Email', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('no_hp', 'No Telepon', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', array(
            'required' => '%s harus diisi !!'
        ));
        $this->form_validation->set_rules('status_nama', 'Status', 'required', array(
            'required' => '%s harus diisi !!'
        ));
    }

    public function delete($id)
    {
        $where = array('id_siswa' => $id);

        $this->Peserta_model->delete($where, 'tb_siswa');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sukses!</strong> Data berhasil dihapus.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');

        redirect('peserta');
    }

    public function detail($id_siswa)
    {

        // Load model untuk mengambil data peserta berdasarkan $id_siswa
        $this->load->model('Peserta_model');
        $data['title'] = 'Detail';
        $data['peserta'] = $this->Peserta_model->get_peserta_by_id($id_siswa);


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('peserta/detail_peserta', $data);
        $this->load->view('templates/footer');
        // Load view detail_peserta.php

    }
    // public function invoice($id_siswa)
    // {

    //     // Load model untuk mengambil data peserta berdasarkan $id_siswa
    //     // $this->load->model('Peserta_model');
    //     $data['title'] = 'Invoice';
    //     $data['peserta'] = $this->Peserta_model->get_peserta_by_id($id_siswa);


    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('peserta/invoice', $data);
    //     $this->load->view('templates/footer');
    //     // Load view detail_peserta.php

    // }

    // public function invoice($id_siswa)
    // {

    //     // Load model untuk mengambil data peserta berdasarkan $id_siswa
    //     $this->load->model('Peserta_model');
    //     $data['title'] = 'Detail';
    //     $data['peserta'] = $this->Peserta_model->get_invoice_by_id($id_siswa);



    //     $this->load->view('peserta/invoice', $data);

    //     // Load view detail_peserta.php

    // }
}
