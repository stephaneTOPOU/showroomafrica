<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function Blog()
    {
        $blogs = Blog::all();
        
        return view('frontend.blog', compact('blogs'));
    }

    public function BlogDetail($slug_blog)
    {
        $blog_id = DB::table('blogs')->where('slug_blog', $slug_blog)->select('id')->get();
        
        $blogs = DB::table('blogs')->where('id', $blog_id[0]->id)
            ->select('*')
            ->get();
            
        return view('frontend.blog-detail', compact('blogs'));
    }
    
}
