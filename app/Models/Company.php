<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model{
    use HasFactory;

    public function receptionists(){
        return $this->hasMany(Receptionist::class);
    }

    public function queues(){
        return $this->hasMany(Queue::class);
    }

    public function peopleWaiting(){
        return $this->queues->where('status', 'Waiting')->count();
    }

}
