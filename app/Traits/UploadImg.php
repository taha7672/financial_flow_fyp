<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait UploadImg
{
    public function uploadImg($path,$img)
    {
        if ($img) {
            $imgName = time() . '.' . $img->getClientOriginalExtension();
            $img->storeAs($path, $imgName, 'uploads');
            return $imgName;
        }
        return 'default.png';
        
       
    }
    
    public function deleteImg($path,$oldImgName)
    {
        if ($oldImgName != 'default.png') {
            Storage::disk('uploads')->delete($path . '/' . $oldImgName);
            return true;
        }

    }



}



?>