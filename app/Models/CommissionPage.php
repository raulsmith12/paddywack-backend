<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionPage extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'page_content'];
}
