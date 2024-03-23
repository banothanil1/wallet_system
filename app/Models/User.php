<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;

class User extends Model
{
    use HasFactory;
    protected $table="users";
    protected $key="id";
  protected $guarded=[];
}
