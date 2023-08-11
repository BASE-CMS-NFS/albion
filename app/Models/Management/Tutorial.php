<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;

class Tutorial extends Model
{
    use HasFactory;

    protected $table = 'ganking';

    protected $fillable = [
        'id',
        'url',
        'judul',
        'description',
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
        $data = Tutorial::orderBy('created_at','desc')->paginate(10);

        return $data;
    }

    public static function detailData($id){
        $data = Tutorial::where('id',$id)->first();

        return $data;
    }

    public static function deleteData($id){
        $data = Tutorial::where('id',$id)->delete();

        return $data;
    }

    public static function insertData($request){
        $data = Tutorial::create([
            "id"                => (string) Str::uuid(),
            "url"               => $request->url,
            "judul"             => $request->judul,
            "description"       => $request->description,
            "created_at"        => date('Y-m-d H:i:s'),
            "updated_at"        => date('Y-m-d H:i:s'),
        ]);

        return $data;
    }

    public static function updateData($request){
        $data = Tutorial::where('id',$request->id)->update([
            "url"               => $request->url,
            "judul"             => $request->judul,
            "description"       => $request->description,
            "updated_at"        => date('Y-m-d H:i:s'),
        ]);

        return $data;
    }
}
