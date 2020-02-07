<?php


namespace App\Utility;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Util
{
    public static function uploadImage($image)
    {

        if ($image){
            $uploadPath = storage_path('app/public/uploads/images/players/');
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, $mode = 0777, true, true);
            }
            $imageName = uniqid('ply_img-') . '.' .$image->getClientOriginalExtension();
            $image->move($uploadPath, $imageName);
            return asset('storage/uploads/images/players/' . $imageName);
        }
        return '';
    }

    public static function FileFromURL($url){
        $t=str_replace(asset('storage'),'',$url);
        return Storage::disk('public')->path(str_replace_first('/','',$t));
    }

}
