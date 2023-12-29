<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // first_name
    // last_name
    // email
    // phone_no
    // address_line_one
    // address_line_two
    // postal_code
    // city

    protected $table = "Customer";

    protected $id = "id";

    protected $guarded = []; // to make all fields mass assignable

}
