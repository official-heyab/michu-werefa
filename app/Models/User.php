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

    public function transactions(){
        return $this->hasMany(UserTransactions::class);
    }

    public function queues(){
        return $this->hasMany(UserQueues::class);
    }

    public function roles(){
        return $this->belongsToMany(Roles::class, 'user_roles');
    }

    public function waitingAt(){
        return $this->branchQueues->where('status', 'Waiting');
    }

    public function remainingAmount(){
        $amount = 0;
        foreach($this->transactions as $balance){
            if($balance->isWithdrawal)
                $amount -= $balance->amount;
            else
                $amount += $balance->amount;
        }
        return number_format($amount, 2, '.', '');
    }
}
