<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = "employees";
    protected $fillable = [ 
        'nama_lengkap', 
        'email', 
        'nomor_telepon', 
        'tanggal_lahir', 
        'alamat', 
        'tanggal_masuk', 
        'status', 
        'departemen_id',
        'jabatan_id'
    ]; 

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'karyawan_id');
    }

    public function salaries()
    {
        return $this->hasMany(Attendance::class, 'karyawan_id');
    }

    public function positions()
    {
        return $this->belongsTo(Position::class, 'jabatan_id');
    }

    public function departments()
    {
        return $this->belongsTo(Department::class, 'departemen_id');
    }
}
