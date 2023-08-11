<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class Kupon extends Model
{
    use HasFactory;

    protected $table = 'kupon';

    protected $fillable = [
        'id',
        'users_id',
        'kupon',
    
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
        $data = Kupon::join('users','kupon.users_id','=','users.id')->select('kupon.*','users.name as users')->orderBy('kupon.created_at','desc')->get();

        return $data;
    }

    public static function listDataByMe(){
        $data = Kupon::join('users','kupon.users_id','=','users.id')
                ->where('kupon.users_id',Session::get('id'))
                ->select('kupon.*','users.name as users')->orderBy('kupon.created_at','desc')->get();

        return $data;
    }

    public static function detailData($id){
        $data = Kupon::where('id',$id)->first();

        return $data;
    }

    public static function deleteData($id){
        $data = Kupon::where('id',$id)->delete();

        return $data;
    }

    public static function insertData($request){
        $data = Kupon::create([
            "id"                => (string) Str::uuid(),
            "kupon"             => $request->kupon,
            "users_id"          => $request->users_id,
            "created_at"        => date('Y-m-d H:i:s'),
            "updated_at"        => date('Y-m-d H:i:s'),
        ]);

        return $data;
    }

    public static function updateData($request){
        $data = Kupon::where('id',$request->id)->update([
            "kupon"             => $request->kupon,
            "users_id"          => $request->users_id,
            "updated_at"        => date('Y-m-d H:i:s'),
        ]);

        return $data;
    }
}
