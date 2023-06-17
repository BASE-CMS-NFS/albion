<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
class Ganking extends Model
{
    use HasFactory;

    protected $table = 'ganking';

    protected $fillable = [
        'id',
        'name',
        'date',
        'loot',
        'qty',
        'description',
        'status',
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
        $data = Ganking::paginate(10);

        return $data;
    }

    public static function detailData($id){
        $data = Ganking::where('id',$id)->first();

        return $data;
    }

    public static function deleteData($id){
        $data = Ganking::where('id',$id)->delete();

        return $data;
    }

    public static function insertData($request){
        $data = Ganking::create([
            "id"                => (string) Str::uuid(),
            "name"              => $request->name,
            "date"              => $request->date,
            "loot"              => $request->loot,
            "qty"               => $request->qty,
            "status"            => $request->status,
            "description"       => $request->description,
            "created_by"        => Session::get('id'),
            "updated_by"        => Session::get('id'),
            "created_at"        => date('Y-m-d H:i:s'),
            "updated_at"        => date('Y-m-d H:i:s'),
        ]);

        return $data;
    }

    public static function updateData($request){
        $data = Ganking::where('id',$request->id)->update([
            "name"              => $request->name,
            "date"              => $request->date,
            "loot"              => $request->loot,
            "qty"               => $request->qty,
            "status"            => $request->status,
            "description"       => $request->description,
            "updated_by"        => Session::get('id'),
            "updated_at"        => date('Y-m-d H:i:s'),
        ]);

        return $data;
    }
}
