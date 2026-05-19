<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

    private $table = 'anggota';

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function is_used($id)
    {
        return $this->db->where('id', $id)->count_all_results($this->table) > 0;
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function get_status_enum()
    {
        $query = $this->db->query("SHOW COLUMNS FROM anggota LIKE 'status'");
        $row = $query->row();

        preg_match("/^enum\(\'(.*)\'\)$/", $row->Type, $matches);
        $enum = explode("','", $matches[1]);

        return $enum;
    }
}