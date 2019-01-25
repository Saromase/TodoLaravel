<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CalendarEvents extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'start', 'end', 'user_id'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'calendar_events';

    public static function add ($data)
    {
        return CalendarEvents::create($data);
    }
    
    public static function getByUser($userId)
    {
        return CalendarEvents::where('user_id', '=', $userId)->get();
    }

    // public static function getById($id)
    // {
    //     return DB::table('postit')
    //         ->where('postit.id', '=', $id)
    //         ->leftJoin('postit_status', 'postit_status.id', '=', 'postit.status')
    //         ->select('postit.*', 'postit_status.color', 'postit_status.name as statusName')
    //         ->first();
    // }

    // public static function edit ($id, $data)
    // {
    //     return PostIt::where('id', '=', $id)
    //         ->update($data);
    // }

    // public static function deleteOne ($id)
    // {
    //     return PostIt::where('id', '=', $id)->delete();
    // }

    // public static function duplicateOne ($id)
    // {
    //     $post = PostIt::where('id', '=', $id)->first();
    //     $post = $post->replicate();

    //     return $post->save();
    // }
}
