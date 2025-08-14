<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'attendances';
    
    protected $fillable = [
        'employee_detail_id',
        'clock_in',
        'clock_out',
    ];

    public function employeeDetail()
    {
        return $this->belongsTo(EmployeeDetail::class, 'employee_detail_id', 'id');
    }
    
    public function employee()
    {
        return $this->belongsTo(EmployeeDetail::class, 'employee_id');
    }
}
