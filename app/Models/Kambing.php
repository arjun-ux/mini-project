<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kambing extends Model
{
    use HasFactory;
    protected $table = 'kambings';
    public $incrementing = false;
    protected $guarded = [];

    public function Kandang()
    {
        return $this->belongsTo(Kandang::class, 'kandang_id');
    }
}
