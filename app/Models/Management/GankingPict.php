<?php

namespace App\Models\Management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Helper;
class GankingPict extends Model
{
    use HasFactory;
    protected $table = 'ganking_pict';

    protected $fillable = [
        'ganking_id',
        'image'
    ];

    public static function insertData($request){

        if($request->file('image')){

            $data['image']=Helper::image($request->file('image'),'albion');
        }

        $data['ganking_id']=$request->ganking_id;

        $save = GankingPict::create($data);

        return $save;
    } 

    public static function updateData($request){

            $check=GankingPict::find($request->id);

            if($check->foto){

                if($request->file('image')){
                    // delete file before update
                    Storage::delete('public/'.$check->image);

                    $data['image']=Helper::image($request->file('image'),'settings');
                }
            }else{
                if($request->file('image')){

                    $data['image']=Helper::image($request->file('image'),'settings');
                }
            }
        
            $data['ganking_id']=$request->ganking_id;
        
            $update=GankingPict::where('id',$request->id)
                ->update($data);

        return $update;
    }
}
