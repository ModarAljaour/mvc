<?php
// app/models/UserModel.php
namespace UserModel;

class UserModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    //........... SELECT User By ID ................
    public function getUserByID($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('users');
    }
    // ............... SELECT USER ................
    public function getUsers()
    {
        return $this->db->get('users');
    }
    // ............... ADD USER ...................
    public function addUser($data)
    {
        return $this->db->insert('users', $data);
    }
    // ............... UPDATE USER .................
    public function updateUser($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }
    // ............... DELETE USER ..................
    public function deleteUser($id)
    {
        $this->db->Where('id', $id);
        $this->db->delete('users');
    }
}
