<?php

namespace App\Http\Controllers\PostIt;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\PostItStatus;
use App\PostIt;


class PostItStatusController extends Controller
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
     * Display user status for post it.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index ()
    {
        $status = PostItStatus::getByUser(Auth::id());
        return view('postit.status.index', [
            'statusList' => $status
        ]);
    }

    /**
     * Display form to add Status with unique view for insert/update.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function add ()
    {
        return view('postit.status.edit');
    }

    /**
     * Post form to add Status.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create (Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:postit_status|max:30',
            'color' => 'required',
        ]);


        $data = $request->except(['_token']);
        $data['user_id'] = Auth::id();
        PostItStatus::add($data);

        return redirect()->route('postitStatusIndex');
    }
    
    /**
     * Display form to add Status with unique view for insert/update.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit ($id) {
        $status = PostItStatus::getById($id);
        return view('postit.status.edit', [
            'status' => $status
        ]);
    }
        
    /**
     * Post form to add Status.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateOne (Request $request)
    {
        $id = $request->input('id');
        $data = $request->except(['_token', 'id']);
        $data['user_id'] = Auth::id();

        PostItStatus::edit($id, $data);

        return redirect()->route('postitStatusIndex');
    }

    /**
     * Delete One Status  if not use.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deleteOne ($id)
    {
        if (PostItStatus::checkUse($id)) {
            PostItStatus::deleteOne($id);
        }
        
        return redirect()->route('postitStatusIndex');
    }
}
