<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyBranch extends Model{
    use HasFactory;

    public function branchReceptionists(){
        return $this->hasMany(BranchReceptionist::class);
    }

    public function branchQueues(){
        return $this->hasMany(BranchQueue::class);
    }

    public function peopleWaiting(){
        return $this->branchQueues->where('status', 'Waiting')->count();
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
