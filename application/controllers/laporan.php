<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if(!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function peminjaman()
    {
        $bulan = $this->input->get('bulan');

        $this->db->select('peminjaman.*, anggota.nama');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.id = peminjaman.anggota_id');

        if($bulan){
            $this->db->where('DATE_FORMAT(tanggal_pinjam,"%Y-%m")=', $bulan);
        }

        $data['data'] = $this->db->get()->result();
        $data['bulan'] = $bulan;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/peminjaman', $data);
        $this->load->view('templates/footer');
    }

    // =======================
    // LAPORAN BUKU (FIX PENULIS)
    // =======================
    public function buku()
    {
        $penulis = $this->input->get('penulis');

        $this->db->select('kode_buku,judul_buku,penulis,penerbit,tahun,stok');
        $this->db->from('buku');

        if($penulis){
            $this->db->like('penulis', $penulis);
        }

        $data['data'] = $this->db->get()->result();
        $data['penulis'] = $penulis;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/buku', $data);
        $this->load->view('templates/footer');
    }

    // =======================
    // CETAK LAPORAN BUKU (FIX PENULIS)
    // =======================
    public function cetak_buku()
    {
        $penulis = $this->input->get('penulis');

        $this->db->select('kode_buku,judul_buku,penulis,penerbit,tahun,stok');
        $this->db->from('buku');

        if($penulis){
            $this->db->like('penulis', $penulis);
        }

        $data['data'] = $this->db->get()->result();
        $data['penulis'] = $penulis;

        $this->load->view('laporan/cetak_buku', $data);
    }

    // LAPORAN ANGGOTA
    public function anggota()
    {
        $nama = $this->input->get('nama');

        if($nama){
            $this->db->like('nama', $nama);
        }

        $data['data'] = $this->db->get('anggota')->result();
        $data['nama'] = $nama;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/anggota', $data);
        $this->load->view('templates/footer');
    }

    // CETAK LAPORAN ANGGOTA
    public function cetak_anggota()
    {
        $nama = $this->input->get('nama');

        if($nama){
            $this->db->like('nama', $nama);
        }

        $data['data'] = $this->db->get('anggota')->result();
        $data['nama'] = $nama;

        $this->load->view('laporan/cetak_anggota', $data);
    }
}