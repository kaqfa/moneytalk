<?php

namespace MoneyTalk;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function addTransaction($input)
    {
        $trans = new Transaction();
        $trans->title = $input['title'];
        $trans->amount = $input['amount'];
        $trans->description = $input['description'];
        $trans->type = $input['type'];
        $trans->status = 1;
        $trans->user_id = $this->id;
        return $trans->save();
    }

    public function getLatestTransactions()
    {

    }
}
