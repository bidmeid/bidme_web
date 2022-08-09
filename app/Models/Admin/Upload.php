<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    protected $table   = 'file';
    protected $fillable = ['judul_file', 'nama_file', 'type_file', 'instansi_id'];
    public $timestamps = false;
}
