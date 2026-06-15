<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $fillable = ['nama','instansi','rating','ulasan','status'];
    protected $attributes = ['status' => 'pending'];
}
