<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function allMembersSelect()
    {
        $members = $this->all();
        return $members;
    }

    public function editMemberSelect($id)
    {
        $member = $this->where('id', $id)->first();
        return $member;
    }
}
