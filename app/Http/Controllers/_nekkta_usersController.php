<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\_Nekkta_Users;

class _nekkta_usersController extends Controller
{


    public function nekkta_reg(Request $r)
    {

        $response['register_user'] = array();
        $u_name = $r->input('nekt_user_name');
        $u_password = $r->input('nekt_user_password');
        $u_email = $r->input('nekt_user_email');


        $nekkta_user = new _Nekkta_Users;

        $nekkta_user->nekkta_user_user_name = $u_name;
        $nekkta_user->nekkta_user_user_password = $u_password;
        $nekkta_user->nekkta_user_user_email = $u_email;

        $nekkta_user->save();

        $value ['response'] = 'successful';
        $value ['error'] = 0;

        array_push($response['register_user'], $value);
        return $response;


    }

}
