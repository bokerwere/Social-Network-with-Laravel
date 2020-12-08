<?php
namespace App\Http\Controllers;
use App\Models\Post;



class PagesController extends Controller{

    public function getIndex(){
        $first="joseph";
        $last="were";
        $fullName=$first ." ".$last;
        $email="jose@gma.com";
        $data=[];
        $data['fullname']=$email;
        $data['email']=$email;
         
        $posts=Post::OrderBy('created_at','desc')->limit(3)->get();

        //return view('pages.welcome')->with("fullname",$fullName)->withEmail($email)->withData($data);
        return view('pages.welcome')->withPosts($posts);
 
 
    }

    public function getAbout(){
        return view('pages.about');

    }

    public function getContact(){
        return view('pages.contact');
    }
} 






?> 