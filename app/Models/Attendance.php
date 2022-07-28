<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table        = 'gx_attendance';
    protected $primaryKey   = 'ID';
    public $timestamps      = false;

}
