<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    //

    public function index(){
        $title = '';
        if(request('category')){
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' in '. $author->name;
        }

        $data = [
            'title' => "All Blog" . $title,
            // 'posts' => Post::latest()->filter(request(['search','author','category']))->get()
            'posts' => Post::latest()->filter(request(['author','search','category']))->paginate(5)->withQueryString()
        ];
        return view('blog', $data);
    }

    public function slug(Post $post){
        $data = [
            'title' => "Post",
            'post' => $post
        ];
    
        return view('post', $data);
    }
}
