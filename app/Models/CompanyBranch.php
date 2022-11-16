<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBranch extends Model{
    use HasFactory;

    public function receptionists(){
        return $this->belongsToMany(User::class, 'receptionists')->withPivot('user_id','user_role_id');
    }

    public function queues(){
        return $this->hasMany(UserQueues::class);
    }

    public function peopleWaiting(){
        return $this->queues->where('status', 'Waiting')->count();
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
