<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['username', 'password', 'no_telephone', 'foto', 'role'];

    public function search ($value) 
    {
        return $this->table('user')->like('username', $value);
    }

    public function cari ($id)
    {
        return $this->table('user')->like('id', $id);
    }
}