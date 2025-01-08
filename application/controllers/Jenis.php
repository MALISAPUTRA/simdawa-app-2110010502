<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('JenisModel');
    }


    public function index()
    {
        $data['title'] = "Dashboard | SIMDAWA-APP";
        $data['jenis'] = $this->JenisModel->get_jenis();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('jenis/jenis_read', $data);
        $this->load->view('template/footer');
    }
    public function tambah()
    {
        if (isset($_POST['create'])) {
            $this->JenisModel->insert_jenis();
            redirect('jenis');
        } else {
            $data['title'] = "Tambah Data Jenis Beasiswa | SIMDAWA-APP";
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('jenis/jenis_create');
            $this->load->view('template/footer');
        }
    }
    public function ubah($id)
    {
        if (isset($_POST['update'])) {
            $this->JenisModel->update_jenis();
            redirect('jenis');
        } else {
            $data['title'] = "Perbarui Data Jenis Beasiswa | SIMDAWA-APP";
            $data['jenis'] = $this->JenisModel->get_jenis_byid($id);
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('jenis/jenis_update', $data);
            $this->load->view('template/footer');
        }
    }
   public function get_jenis_byid($id){
        return $this->db->get_where($this->tabel, ['id'=>$id])->row();
    }

    public function update_jenis(){
        $data =[
            'nama_jenis' => $this->input->post('nama_jenis'),
            'keterangan' => $this->input->post('keterangan')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel,$data);
    }
    public function hapus($id)
    {
        if (isset($id)) {
            $this->JenisModel->delete_jenis($id);
            redirect('jenis');
        }
    }
}
