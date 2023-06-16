<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;
class GankingDetail extends Model
{
    use HasFactory;
    protected $table = 'ganking_detail';

    protected $fillable = [
        'id',
        'ganking_id',
        'users_id',
        'loot',
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

    public static function listData(){
        $data = GankingDetail::paginate(10);

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
            "presentase"        => $request->presentase,
            "regear"            => $request->regear,
            "time_start"        => $request->time_start,
            "time_end"          => $request->time_end,
            "play_time"         => $request->play_time,
            "updated_by"        => Session::get('id'),
            "updated_at"        => date('Y-m-d H:i:s'),
        ]);

        return $data;
    }
}
