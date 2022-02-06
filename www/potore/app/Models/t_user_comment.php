<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class t_user_comment extends Model
{
    protected $fillable = [ 'send_user_id', 'target_user_id', 'comment' ];

    public function userShow(int $id){       
        return $this
        ->leftJoin('users','t_user_comments.send_user_id','users.id')
        ->where('t_user_comments.target_user_id', $id)
        ->orderBy('t_user_comments.created_at', 'desc')
        ->simplePaginate(5);
    }
    
    #
    #   delete
    #

    public function allDelete()
    {
        $userID = Auth::ID();
        $this
        ->where('send_user_id', $userID)
        ->orWhere('target_user_id', $userID)
        ->delete();
    }
}