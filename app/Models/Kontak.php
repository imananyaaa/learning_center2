<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    protected $table = 'kontak';
    protected $fillable = ['nama','email','telepon','pesan','balasan','status'];
    protected $attributes = ['status' => 'baru'];
}
