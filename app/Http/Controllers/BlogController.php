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

    public function BlogDetail($blog_id)
    {
        $blogs = DB::table('blogs')->where('id', $blog_id)
            ->select('*')
            ->get();
            
        return view('frontend.blog-detail', compact('blogs'));
    }
    
}
