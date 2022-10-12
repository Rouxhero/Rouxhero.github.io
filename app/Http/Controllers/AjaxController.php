<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public static function gitpull(Request $request){
        exec('sh scripts/pull.sh',$stdout);
        // exec('cd ..&&git pull&&php artisan route:cache&&echo "pull">>mem.txt',$stdout,$stderr);
        return json_encode(array('stdout'=>$stdout));
    }
    public static function savedb(Request $request){

    }
    public static function freshdb(Request $request){

    }
    public static function cache(Request $request){
        exec('cd ..&&php artisan route:cache',$stdout,$stderr);
        return json_encode(array('stdout'=>$stdout, 'stderr'=>$stderr));
    }
}
