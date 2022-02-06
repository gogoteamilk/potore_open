<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_area extends Model
{
    public function index(){
        return $this->orderBy('id','asc')->get();
    }
}
