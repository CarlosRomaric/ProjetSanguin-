<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Member extends Model
{
    //Table name
    protected $table = 'members';
    //Primary key
    protected $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    protected $guarded = [];

    public static function listingMembers()
    {
        return $query = Member::orderBy('created_at','desc')->get();
    } 

    public static function  getRequest(Request $request)
    {
        $data = $request->all();
        return $data;

    }
}
