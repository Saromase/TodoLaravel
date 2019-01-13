<?php

namespace App\Http\Controllers\PostIt;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\PostIt;
use App\PostItStatus;

class PostItController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct ()
    {
        $this->middleware('auth');
    }

    /**
     * Display user post it.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index ()
    {
        $posts = PostIt::getByUser(Auth::id());

        return view('postit.index', [
            'posts'  => $posts,
        ]);
    }

    /**
     * Display form to add post it with unique view for insert/update.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add ()
    {
        $status = PostItStatus::getByUser(Auth::id());

        return view('postit.edit', [
            'statusList' => $status
        ]);
    }

    /**
     * Post form to add post it.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create (Request $request)
    {
        $data = $request->except(['_token']);
        $data['user_id'] = Auth::id();
        PostIt::add($data);

        return redirect()->route('postitIndex');
    }
    
    /**
     * Display form to add post it with unique view for insert/update.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit ($id) {
        $post = PostIt::getById($id);
        $status = PostItStatus::getByUser(Auth::id());

        return view('postit.edit', [
            'post'   => $post,
            'statusList' => $status
        ]);
    }
        
    /**
     * Post form to add post it.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateOne (Request $request)
    {
        $id = $request->input('id');
        $data = $request->except(['_token', 'id']);
        $data['user_id'] = Auth::id();

        PostIt::edit($id, $data);

        return redirect()->route('postitIndex');
    }

    /**
     * Post form to add post it.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteOne ($id)
    {
        PostIt::deleteOne($id);

        return redirect()->route('postitIndex');
    }

    /**
     * Post form to add post it.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function duplicateOne ($id)
    {
        PostIt::duplicateOne($id);

        return redirect()->route('postitIndex');
    }
}


