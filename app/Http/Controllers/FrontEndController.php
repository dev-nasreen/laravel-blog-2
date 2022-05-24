<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
   public function home(){
    $recentPosts = Post::with('category')->orderBy('created_at', 'DESC')->paginate(9);
  
    return view('website.home', compact(['recentPosts']));
   }
   public function about(){
    return view('website.about');
   }
   public function category(){
    return view('website.category');
   }
   public function contact(){
    return view('website.contact');
   }
   public function post($slug){
        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        if($post){
            return view('website.post', compact('post'));
        }else{
            return redirect('/');
        }
   }
}
