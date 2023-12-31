<?php
namespace App\Helpers;

use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Http;
use Image;
use Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Nfs;
use App\Models\Management\Ganking;
use App\Models\Management\GankingDetail;
use App\Models\Management\GankingPict;
use App\Models\User;
 
class Helper {

    public static function resizeImage($file,$folder){
        $image              = $file;
        $ext                = $file->extension();
        $filename           = Str::random(50).'.'.$ext;

        $lebar_gambar = Image::make($file)->width();
    
        $lebar_gambar -= $lebar_gambar * 50 / 100;
     
        $destinationPath = storage_path().'/app/public'.'/'.$folder;
        $img = Image::make($image->path());
        $img->resize($lebar_gambar, null, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$filename);
   
        return $folder.'/'.$filename;
    }

    public static function image($file,$folder){

        $ext                = $file->extension();
        
        $filename           = Str::random(50).'.'.$ext;
        $file_path          = 'public/'.$folder;

        $path               =Storage::putFileAs($file_path, $file, $filename);

        return $folder.'/'.$filename;
    }

    public static function deleteImage($location){
        
        $check = Storage::delete('public/'.$location);
        
        return $check;
    }

    public static function upper($str){
        return strtoupper($str);
    }

    public static function uc($str){
        return ucfirst($str);
    }

    //GENERATE URL VERIFIKASI

    public static function urlVerifikasi($email){
        $en     = Nfs::Encrypt($email);

        $result = url('verifikasi/'.$en);

        return $result;

    }

    public static function nameUser($id){

        $data = DB::table('users')->where('id',$id)->first();

        return $data->name;
    }


    public static function countMember(){
        $data = DB::table('users')->count();

        return $data;
    }

    public static function totalLoot(){

        $data = Ganking::sum('loot');

        return $data;

    }

    public static function totalContent(){

        $data = Ganking::count();

        return $data;

    }



    public static function userGanking($users_id){
        $loot_all   = GankingDetail::where('users_id',$users_id)->sum('loot');
        $time_all   = GankingDetail::where('users_id',$users_id)->sum('play_time');

        ################################################################
        $firstday   = date('d/m/Y', strtotime("sunday -1 week"));
        $lastday    = date('d/m/Y', strtotime("sunday 0 week"));

        $startDate  = Carbon::createFromFormat('d/m/Y', $firstday);
        $endDate    = Carbon::createFromFormat('d/m/Y', $lastday);
        ###############################################################

        $loot_week  = GankingDetail::where('users_id',$users_id)->whereBetween('created_at', [$startDate, $endDate])->sum('loot');

        $time_week  = GankingDetail::where('users_id',$users_id)->whereBetween('created_at', [$startDate, $endDate])->sum('play_time');

        $data = [
            "loot_all" => $loot_all,
            "time_all" => $time_all,
            "loot_week"=> $loot_week,
            "time_week"=> $time_week,
            "image"    => url('/web/profile/'.rand(1,14).'.jpg')
        ];

        return $data;

    }

}