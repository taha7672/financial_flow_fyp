<?php
use Illuminate\Support\Facades\Config;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Backend\Admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


// dateFormat 
function dateFormat($date)
{
    if($date != '' || $date != null){
        $date = date_create($date);
        $date = date_format($date, 'd M Y');
        return $date;
    }
    else{
        return '';
    }
    
}

function changeFormat($date) {
    if($date == '-1'){
        return $date;
    }
    else{
        $carbon = Carbon::createFromFormat('m/d/Y', $date);
        return $carbon->toDateString();
    }
}
// change date fromat from 22-Jun-2019 to 2002-03-23
function FormatForDB($date)
{
    $date = date_create($date);
    $date = date_format($date, 'Y-m-d');
    return $date;
}

### REMOVE EXISTING FILES IN storage/app/public/pdf
function deleteAllStoragePDFs()
{
    $file = new Filesystem;
    $file->cleanDirectory('storage/app/public/pdf');
}
function getConstant($key)
{
    return Config::get('constants.' . $key);
    exit;
}

### SEND RESPONS ###
 function sendResponse($success, $message, $data = null, ) {
    
    $response = [
        'status' => $success,
        'message' => $message,
        'data' => $data
    ];
    return response()->json($response);
}



