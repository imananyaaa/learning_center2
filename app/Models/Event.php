<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['nama','deskripsi','tanggal','waktu','lokasi','jenis','kuota','status','foto'];
    protected $attributes = ['status' => 'aktif'];
}
