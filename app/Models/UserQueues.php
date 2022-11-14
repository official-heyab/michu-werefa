<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQueues extends Model{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function companyBranch(){
        return $this->belongsTo(CompanyBranch::class);
    }
}
