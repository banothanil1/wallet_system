<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressRelationship extends Model
{
    use HasFactory;
    protected $table="adressrelationships";
    protected $key="id";
    protected $guarded=[];
}
