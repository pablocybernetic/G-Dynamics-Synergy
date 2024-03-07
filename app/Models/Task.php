<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // app/Models/Task.php

protected $fillable = ['title', 'description'];

    // use HasFactory;
}
