<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    public $id;
    public $tennhanvien;

    public function __construct($id, $tennhanvien) {
        $this->id = $id;
        $this->tennhanvien = $tennhanvien;
    }
}
