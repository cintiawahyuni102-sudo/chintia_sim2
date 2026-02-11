<?php

class hello extends CI_controller {
    public function index()
{
    $data['nama'] = "Codeigneter 3 + php 7.3";
    $this->load->view('hello_view', $data);
}


}