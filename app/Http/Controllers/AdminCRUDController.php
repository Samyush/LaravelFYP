<?php

namespace App\Http\Controllers;

use App\AdminView;
use Illuminate\Http\Request;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class AdminCRUDController extends Controller
{
    public function index()
    {
        $post = AdminView::paginate(4);
        return view('post.adminControl', compact('post'));
    }

    public function addPost(Request $request)
    {
        $rules = array(
            'email' => 'required',
            'password' => 'required',
            'name'=>'required',

        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors' => $validator->getMessageBag()->toarray()));

        else {
            $post = new AdminView;
            $post->name = $request->name;
            $post->email = $request->email;
            $post->year_id = $request->year_id;
            $post->password = bcrypt($request->password);
            $post->save();
            return response()->json($post);
        }
    }

    public function editPost(request $request)
    {
        $post = AdminView::find($request->id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->year_id = $request->year_id;
        $post->password = bcrypt($request->password);
        $post->save();
        return response()->json($post);
    }

    public function deletePost(request $request)
    {
        $post = AdminView::find($request->id)->delete();
        return response()->json();
    }
}
