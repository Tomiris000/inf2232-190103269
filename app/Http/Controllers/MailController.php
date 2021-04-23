<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{


    public function sendEmail(){
        $data = [
          'name' => 'Tomiris',
          'surname' => 'Bakhyt',
          'email' => '190103269@stu.sdu.edu.kz'
        ];
        Mail::to('190@stu.sdu.edu.kz')->send(new TestMail($data));
      }
}
