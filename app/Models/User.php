<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userBalanceSheets(){
        return $this->hasMany(UserBalanceSheet::class);
    }

    public function branchQueues(){
        return $this->hasMany(BranchQueue::class);
    }

    public function waitingAt(){
        return $this->branchQueues->where('status', 'Waiting');
    }

    public function remainingAmount(){
        $amount = 0;
        foreach($this->userBalanceSheets as $balance){
            if($balance->isWithdrawal)
                $amount -= $balance->amount;
            else
                $amount += $balance->amount;
        }
        return number_format($amount, 2, '.', '');
    }
}
