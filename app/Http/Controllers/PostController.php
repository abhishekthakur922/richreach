<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->orderBy('id', 'desc');

        $details['posts'] = $posts->paginate(20);

        return view('frontend.post.index', $details);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('get'))
        {
          return view('frontend.post.create');
        }
        else
        {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);
            
            $post = Post::create([
                'user_id' => auth()->id(),
                'title' => $request->title,
                'content' => $request->content,
            ]);

            if($post)
            {
              return redirect('/posts')->with('success', 'Post Created successfully!');   
            }
        }
        
    }

    public function update(Request $request, $id)
    {
        if ($request->isMethod('get'))
        {
            $details['post'] = Post::where('id', $id)->first();

            return view('frontend.post.update',$details);
        }
        else
        {
            $request->validate([
                'title' => 'required',
                'content' => 'required',
            ]);

            $post = Post::find($id);

            $post->title = $request->title;
            $post->content = $request->content;
            $post->updated_at = date("Y-m-d H:i:s");

            $update_post = $post->update();

            if($update_post)
            {
              return redirect('/posts')->with('success', 'Post Updated successfully!');   
            }
        }
        
    }

    public function view(Request $request, $id)
    {
        if ($request->isMethod('get'))
        {
            $details['post'] = Post::with('user')->where('id', $id)->first();

            return view('frontend.post.view',$details);
        }
    }

    public function destroy(Request $request, $id)
    {
        $delete_post = Post::destroy($id);

        if($delete_post)
        {
          return redirect()->route('posts')->with('success', 'Post Deleted Successfully!');   
        }
    }
}
