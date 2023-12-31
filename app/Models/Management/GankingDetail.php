<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class GankingDetail extends Model
{
    use HasFactory;
    protected $table = 'ganking_detail';

    protected $fillable = [
        'id',
        'ganking_id',
        'users_id',
        'loot',
        'chest_loot',
        'presentase',
        'regear',
        'time_start',
        'time_end',
        'play_time',
        'created_by',
        'updated_by',
    ];

    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    public static function listData($id){
        $data = GankingDetail::join('users','users.id','=','ganking_detail.users_id')
                ->where('ganking_detail.ganking_id',$id)
                ->select('users.name as users','ganking_detail.*')
                ->orderBy('created_at','desc')
                ->get();

        return $data;
    }

    public static function detailData($id){
        $data = GankingDetail::where('id',$id)->first();

        return $data;
    }

    public static function deleteData($id){
        $data = GankingDetail::where('id',$id)->delete();

        return $data;
    }

    public static function insertData($request){
        $data = GankingDetail::create([
            "id"                => (string) Str::uuid(),
            "ganking_id"        => $request->ganking_id,
            "users_id"          => $request->users_id,
            "loot"              => $request->loot,
            "chest_loot"              => $request->chest_loot,
            "presentase"        => $request->presentase,
            "regear"            => $request->regear,
            "time_start"        => $request->time_start,
            "time_end"          => $request->time_end,
            "play_time"         => $request->play_time,
            "created_at"        => date('Y-m-d H:i:s'),
            "updated_at"        => date('Y-m-d H:i:s'),
        ]);

        return $data;
    }

    public static function updateData($request){
        $data = GankingDetail::where('id',$request->id)->update([
            "ganking_id"        => $request->ganking_id,
            "users_id"          => $request->users_id,
            "loot"              => $request->loot,
            "chest_loot"              => $request->chest_loot,
            "presentase"        => $request->presentase,
            "regear"            => $request->regear,
            "time_start"        => $request->time_start,
            "time_end"          => $request->time_end,
            "play_time"         => $request->play_time,
            "updated_at"        => date('Y-m-d H:i:s'),
        ]);

        return $data;
    }
}
