<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'gender',
        'email',
        'postcode',
        'address',
        'building_name',
        'opinion'
    ];

    public function scopeNameSearch($query, $name)
    {
        if(!empty($name)) {
            $query->where('fullname', 'like', '%'. $name . '%');
        }
    }

    public function scopeGenderSearch($query, $gender)
    {
        if($gender == 1) {
            $query->where('gender', $gender);
        } elseif($gender == 2) {
            $query->where('gender', $gender);
        } else {
            //何もしない
        }
    }

    public function scopeDateSearch($query, $date_first, $date_last)
    {
        if(!empty($date_first) && !empty($date_last)) {
            $query->whereBetween("created_at", [$date_first, $date_last]);
        }
    }

    public function scopeEmailSearch($query, $email)
    {
        if(!empty($email)) {
            $query->where('email', 'like', '%'. $email . '%');
        }
    }
}
