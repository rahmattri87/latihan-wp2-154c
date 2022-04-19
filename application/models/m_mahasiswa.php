<?php
class m_mahasiswa extends CI_Model
{
    private $table = "mahasiswa";
    private $primary = "nim";

    function tampilData()
    {
        $this->db->order_by($this->primary, 'asc');
        return $this->db->get($this->table);
    }

    function save($data){
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function delete($nim){
        $this->db->where($this->primary, $nim);
        $this->db->delete($this->table);

        //delete from mahasiswa where nim = $nim;
    }
}


//CRUD (Create*, Read*, Update, Delete*)
