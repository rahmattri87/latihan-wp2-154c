<?php
class mahasiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //Statment
        $this->load->model('m_mahasiswa');
    }

    function index()
    {
        $data['mahasiswa'] = $this->m_mahasiswa->tampilData()->result();
        //print_r($data['mahasiswa']);
        //exit();
        $this->load->view('mahasiswa', $data);
    }

    function tambah(){
        $this->load->helper('url');
        $this->load->view('input_mahasiswa.php');
    }

    function insert(){
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $jurusan = $this->input->post('jurusan');
        $alamat = $this->input->post('alamat');

        $data = array(
            'nim' => $nim,
            'nama' => $nama,
            'jurusan' => $jurusan,
            'alamat' => $alamat
        );

        $this->m_mahasiswa->save($data);
        redirect('mahasiswa/index');

    }


    function delete($nim){
        $this->m_mahasiswa->delete($nim);
        redirect('mahasiswa/index');
    }

}
