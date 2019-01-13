<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostItStatus extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'color', 'user_id'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'postit_status';

    /**
     * Add post it in database and return view.
     * 
     * @param array   $data Data to update.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public static function add ($data)
    {
        PostItStatus::create($data);
        return redirect()->route('postitIndex');
    }
    
    /**
     * Add Status in database.
     * 
     * @param integer $userId Identifiant of Status.
     *
     * @return \App\PostItStatus
     * 
     */
    public static function getByUser($userId)
    {
        return PostItStatus::where('user_id', '=', $userId)->get();
    }

    /**
     * Get One Status.
     *
     * @param integer $id   Identifiant of Status.
     * 
     * @return \App\PostItStatus
     * 
     */
    public static function getById($id)
    {
        return PostItStatus::find($id);
    }

    /**
     * Update Status in database.
     *
     * @param integer $id   Identifiant of Status.
     * @param array   $data Data to update.
     * 
     * @return \App\PostItStatus
     * 
     */
    public static function edit ($id, $data)
    {
        return PostItStatus::where('id', '=', $id)
            ->update($data);
    }

    /**
     * Delete One Status in database.
     * 
     * @param integer $id Identifiant of Status.
     *
     * @return \App\PostItStatus
     * 
     */
    public static function deleteOne ($id)
    {
        return PostItStatus::where('id', '=', $id)->delete();
    }
    
    /**
     * Delete One Status in database.
     *
     * @param integer $id Identifiant of Status.
     *
     * @return bool 
     * 
     */
    public static function checkUse ($id)
    {
        $count = PostIt::where('status', '=', $id)
            ->whereNull('deleted_at')
            ->count();

        return ($count === 0) ? true : false;
    }
}
