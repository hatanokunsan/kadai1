<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    // 機能していない？
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function allMembersSelect()
    {
        $members = $this->all();
        return $members;
    }

    public function editMemberSelect($request)
    {
        $id = $request;
        $member = $this->where('id', $id);
        return $member;
    }
}
