<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
   public function home(){
    $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(5)->get();
    $firstPosts2 = $posts->splice(0, 2);
    $middlePosts = $posts->splice(0, 1);
    $lastPosts = $posts->splice(0);
 
    $footerposts = Post::with('category', 'user')->inRandomOrder()->limit(4)->get();
    $firstFooterPost = $footerposts->splice(0, 1);
    $middleFooterPost = $footerposts->splice(0, 2);
    $lastFooterPost = $footerposts->splice(0);
    
    $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);
  
    return view('website.home', compact(['recentPosts', 'firstPosts2','middlePosts','lastPosts', 'posts','firstFooterPost','middleFooterPost', 'lastFooterPost']));
   }
   public function about(){
    return view('website.about');
   }
   public function category($slug){
    $category = Category::where('slug', $slug)->first();
    if($category){
        $posts =Post::with('category', 'user')->where('category_id', $category->id)->paginate(9);
        return view('website.category', compact(['category', 'posts']));
    }else{
        return redirect()->route('website');
    }
   }
   public function contact(){
    return view('website.contact');
   }
   public function post($slug){
        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        $posts = Post::with('category', 'user')->inRandomOrder()->limit(3)->get();
        $tags= Tag::all();
        $categories = Category::all();
         // More related posts
         $relatedPosts = Post::orderBy('category_id', 'desc')->inRandomOrder()->take(4)->get();
         $firstRelatedPost = $relatedPosts->splice(0, 1);
         $firstRelatedPosts2 = $relatedPosts->splice(0, 2);
         $lastRelatedPost = $relatedPosts->splice(0, 1);
      
        if($post){
            return view('website.post', compact(['post', 'posts', 'categories', 'tags', 'firstRelatedPost', 'firstRelatedPosts2', 'lastRelatedPost']));
        }else{
            return redirect('/');
        }
   }
}
