<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Smasuk extends Model
{
    use HasFactory;
    protected $fillable= ['nomasuk', 'perihal', 'asal','tanggal', 'ket'];
}
