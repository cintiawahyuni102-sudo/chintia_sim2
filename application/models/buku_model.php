<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {

    private $table = 'buku';

    // Ambil semua data + join kategori
    public function get_all()
    {
        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from($this->table);
        $this->db->join('kategori', 'kategori.id = buku.kategori_id', 'left');
        return $this->db->get()->result();
    }

    // Ambil berdasarkan kode_buku
    public function get_by_id($kode_buku)
    {
        $this->db->where('kode_buku', $kode_buku);
        return $this->db->get($this->table)->row();
    }

    // Insert data
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Hapus data
    public function delete($kode_buku)
    {
        return $this->db->delete($this->table, ['kode_buku' => $kode_buku]);
    }

    // Update data
    public function update($kode_buku, $data)
    {
        $this->db->where('kode_buku', $kode_buku);
        return $this->db->update($this->table, $data);
    }
}