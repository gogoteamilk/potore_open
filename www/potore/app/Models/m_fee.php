<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class m_fee extends Model
{
    public function index(){
        return $this->orderBy('id','asc')->get();
    }
}
