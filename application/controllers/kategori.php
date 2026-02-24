<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
    }
    public function index()
    {
        $data['kategori'] = $this->kategori_model->get_all();
        $this->load->view('kategori/index',$data);
        
    }
}