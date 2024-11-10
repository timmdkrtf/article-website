<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;

    protected $table = 'mains';
    protected $fillable = [
        'title',
        'logo'
    ];

    public function article(){
        return $this->hasMany(Article::class);
    }
}
