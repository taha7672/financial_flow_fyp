<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Backend\Customer;
use App\Models\Backend\Invoice;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Auth\Passwords\CanResetPassword as ResetPassword;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'address',
        'email',
        'password',
        'country',
        'privacy_policy',
        'terms_of_services',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // users has many customers relationship 
    public function customers()
    {
        return $this->hasMany(Customer::class, 'user_id', 'id');
    }
    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'client_id' , 'id');
    }
    /**
 * Send a password reset notification to the user.
 *
 * @param  string  $token
 * @return void
 */
    // send  passwordreset notification link mailtrap 
    

    public function sendPasswordResetNotification($token)
    {
        $url = 'https://example.com/reset-password?token=' . $token;
        // dd($url);
     
        $this->notify(new ResetPasswordNotification($url));


    }
      

     

}
