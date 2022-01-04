<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skeluar extends Model
{
    use HasFactory;
    protected $fillable= ['nokeluar', 'perihal', 'dituju','tanggal', 'ket'];
}
