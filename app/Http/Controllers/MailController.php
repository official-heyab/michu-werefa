<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {

   public function basic_email() {
        $data = array(
            'name'=> "Heyab",
            'email'=> "official.heyab@gmail.com",
            'phone'=> "0977332146",
            'msg'=> "I love you",
        );

      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('heyabgetachew@gmail.com', 'Tutorials Point')
         ->cc(['official.heyab@gmail.com'])
         ->subject('Laravel Basic Testing Mail');

         $message->from('info@michuwerefa.com','Virat Gandhi');
      });
      echo "Basic Email Sent. Check your inbox.";
   }

   public function html_email() {

        $data = array(
            'name'=> "Heyab",
            'email'=> "official.heyab@gmail.com",
            'phone'=> "0977332146",
            'msg'=> "I love you",
        );

      Mail::send('mail', $data, function($message) {
         $message->to('heyabgetachew@gmail.com', 'Tutorials Point')
         ->cc(['official.heyab@gmail.com'])
         ->subject('Laravel HTML Testing Mail');
         $message->from('info@michuwerefa.com','Virat Gandhi');
      });

      echo "HTML Email Sent. Check your inbox.";
   }

   public function attachment_email() {

        $data = array(
            'name'=> "Heyab",
            'email'=> "official.heyab@gmail.com",
            'phone'=> "0977332146",
            'msg'=> "I love you",
        );


      Mail::send('mail', $data, function($message) {
         $message->to('heyabgetachew@gmail.com', 'Tutorials Point')
         ->subject('Laravel Testing Mail with Attachment');

         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('info@michuwerefa.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }


   public function contactus(Request $request){
       $request->validate([
           'name'          => 'required',
           'email'         => 'required|email',
           'phone'        => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:3',
           'message'       => 'required',
       ]);


        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'msg'=>$request->message,
        );

        Mail::send('mail', $data, function($message) {
            $message->to('winbislov@gmail.com', 'General Manager')
            ->cc(['official.heyab@gmail.com'])
            ->subject("Message from Contact Form");

            $message->from('info@michuwerefa.com', "Michu Werefa");
        });

       return response()->json(['success'=>'Successfully']);
   }


}
