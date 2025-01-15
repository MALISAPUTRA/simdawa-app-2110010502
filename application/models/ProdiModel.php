<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProdiModel extends CI_Model
{
    private $tabel = "prodi";

    public function get_prodi()
    {
        return $this->db->get($this->tabel)->result();
    }

    public function insert_prodi()
    {
        $data = [
            'nama_prodi' => $this->input->post('nama_prodi'),
        ];
        $this->db->insert($this->tabel, $data);
    }

    public function get_prodi_byid($id)
    {
        return $this->db->get_where($this->tabel, ['id' => $id])->row();
    }

    public function update_prodi()
    {
        $data = [
            'nama_prodi' => $this->input->post('nama_prodi'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update($this->tabel, $data);
    }

    public function delete_prodi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->tabel);
    }
}
