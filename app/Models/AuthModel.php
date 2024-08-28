<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function save_register($data)
    {
        $this->db->table('user')->insert($data);
    }
    public function login($name, $password)
    {
        return $this->db->table('user')->where([
            'name' => $name,
            'password' => $password,
        ])->get()->getRowArray();
    }
}
