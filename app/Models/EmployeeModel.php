<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'employees';

    // Define the fillable properties for mass assignment
    protected $fillable = ['title', 'task', 'message', 'user_id', 'status', 'accepted_at'];

    // Cast 'accepted_at' to a Carbon instance for easier date manipulation
    protected $casts = [
        'accepted_at' => 'datetime',
    ];


    public function statusClass()
    {
    switch ($this->status) {
        case 'completed':
            return 'text-dark'; // Green
        case 'processing':
            return 'text-dark'; // Blue
        case 'rejected':
            return 'text-dark'; // Red
        default:
            return 'text-dark'; // Yellow (Pending)
    }
    }
}
