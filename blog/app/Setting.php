<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $filleable=['contact_number','contact_email','site_name','address'];
}
