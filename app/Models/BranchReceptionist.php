<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchReceptionist extends Model{
    use HasFactory;

    public function companyBranch(){
        return $this->belongsTo(CompanyBranch::class);
    }
}
