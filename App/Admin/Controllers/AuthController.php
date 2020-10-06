<?php

namespace App\Admin\Controllers;

use App\Admin\Models\AuthData;
use Core\Auth;

class AuthController
{
    public function postCheckPhoneNumber()
    {
        $phone_number = $_POST['phone_num'];

        $result = AuthData::isPhoneNumerRegister($phone_number);

        $response = [];
        if ($result > 0) {
            $response = [
                'code' => -1,
                'message' => 'phone number is registed',
                'class' => 'border-red-500',
                'classText' => 'text-red-400'

            ];
        } else {
            $response = [
                'code' => 1,
                'message' => 'oke',
                'class' => 'border-green-400',
                'classText' => 'text-green-400'
            ];
        }

        echo json_encode($response);
    }

    public function postCheckUserEmail()
    {
        $email = strval($_POST['email']);

        $result = AuthData::checkUserEmail($email);

        $response = [];
        if ($result > 0) {
            $response = [
                'code' => -1,
                'message' => 'email is registed',
                'class' => 'border-red-500',
                'classText' => 'text-red-400'

            ];
        } else {
            $response = [
                'code' => 1,
                'message' => 'oke',
                'class' => 'border-green-400',
                'classText' => 'text-green-400'
            ];
        }

        echo json_encode($response);
    }

    public function postUserRegister()
    {
        $user = $_POST['user'];

        $user['_passwd'] = Auth::encrypt($user['_passwd']);

        AuthData::registNewUser($user);
    }

    
}
