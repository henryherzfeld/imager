<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function index()
    {

        return view('wall');
    }

    public function viewstep($post, $step)
    {
        if($step == 'upload'){
            return view("create/upload");
        }
        else if($step == 'filter'){
            return view("create/filter");
        }
        else if($step == 'caption'){
            return view("create/caption");
        }
    }

    public function show(Request $request)
    {
//        dd($request->all());
        echo $request->file('filename')->getClientOriginalName();
    }

    public function store($postID, $step, Request $request)
    {
        $post = \App\Post::find($postID);

        if($step === 'upload')
        {
            if($post->EDIT != 0)
            {

            }

            elseif ($request->hasFile('filename'))
            {
                if(!$request->file('filename')->isValid())
                {
                    $this->validate($request, [
                        'filename' => 'required',
                        'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                    ]);
                    return back();
                }
                $post->IMAGE_NAME = $request->file('filename')->getClientOriginalName();
                $post->IMAGE_PATH = $request->file('filename')->storeAs('public', $post->IMAGE_NAME);
                $post->save();
                $request->flash();
                return redirect("posts/create/{$post->id}/filter");
            }
            else
            {
                return back();
            }


        }
        else if($step === 'filter')
        {
            if($post->EDIT === 2 || $post->EDIT === 3)
            {

            }

            else
            {
             $post->EDIT = 1;
             $post->save();
            }
            $request->flash();
            return redirect("posts/create/{$post->id}/caption");
        }
        else if($step === 'caption')
        {
            if($post->EDIT === 3)
            {

            }
            else
            {
                $post->STATUS_TITLE = $request->input('title');
                $post->STATUS_TEXT = $request->input('body');
                $post->COMPLETE = true;
                $post->save();
            }
            return view('/home');
        }

    }

    public function newPost()
    {
        //create post and insert username
        DB::insert('insert into posts (USER_USERNAME) values (?)', [ Auth::user()->name]);

        //select the new post
        $post = DB::select('select * from posts where USER_USERNAME = ?', [Auth::user()->name]);
        $post = array_last($post);


        //assign new post's id to user's current post: postID
        DB::update('update users set postID = ? where  id = ?', [$post->id, Auth::user()->id]);


        return redirect("posts/create/{$post->id}/upload");
    }

    public function wall()
    {
        $posts = DB::table('posts')->orderBy('updated_at', 'dec')->paginate(50);
        return view('wall', compact('posts'));
    }
}
