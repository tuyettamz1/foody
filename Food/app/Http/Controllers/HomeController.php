<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function postContact(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' =>'required',       
            'email' =>'required|email',       
            'body' =>'required',       
                
            
        ],
        [  
            'name.required' => 'Vui lòng nhập tên người gửi',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'email.required' => 'Vui lòng nhập email',
            'body.required' => 'Vui lòng nhập nội dung tin nhắn',
            'email.email' => 'Email không đúng định dạng',
            'image.required' => 'Vui lòng chọn ảnh',
            'address.required' => 'Vui lòng nhập địa chỉ',
               
        ]);
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->body = $request->body;
        $contact->save();
        return redirect('/lien-he')->with('success','Yêu cầu của bạn đã được gửi đi thành công !');


    }



    public function about()
    {
        return view('home.about');
    }


}
