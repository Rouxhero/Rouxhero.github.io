<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\State;
use App\Models\Machine;
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
    public static function edituser(Request $request){
        return view("editUser", array("user"=>User::where('email',$request->email)->first()))->render();
    }
    public static function updateUser(Request $request){
        $user = User::where('email',$request->email)->first();
        $user->name = $request->name;
        $user->right = $request->right;
        $user->save();
    }
    public static function addm(Request $request){
        $user = auth()->user()->name;
        $lng = $request->lng;
        $lat = $request->lat;
        $name = $request->name;
        $code = $request->code;
        $machine = Machine::create(array(
            "name" => $name,
            "longitude" => $lng,
            "latitude" => $lat,
            "code"=> $code,
            "author"=> $user));
        State::create(array(
            "id_machine"=>$machine->id,
            "state"=>'{
                "state": 0,
                "product": {
                    "coffee": {
                        "state": 1,
                        "0": {
                            "name": "Americano",
                            "sate": 1
            
                        },
                        "1": {
                            "name": "Cappuccino",
                            "sate": 1
            
                        },
                        "2": {
                            "name": "Latte",
                            "sate": 1
            
                        }
                    },
                    "coffeeB": {
                        "state": 1,
                        "0": {
                            "name": "Americano",
                            "sate": 1
            
                        },
                        "1": {
                            "name": "Cappuccino",
                            "sate": 1
            
                        },
                        "2": {
                            "name": "Latte",
                            "sate": 1
            
                        }
                    },
                    "Chocolate": {
                        "state": 1,
                        "0": {
                            "name": "Americano",
                            "sate": 1
            
                        },
                        "1": {
                            "name": "Cappuccino",
                            "sate": 1
            
                        },
                        "2": {
                            "name": "Latte",
                            "sate": 1
            
                        }
                    },
                    "Soupe": {
                        "state": 1,
                        "0": {
                            "name": "Americano",
                            "sate": 1
            
                        },
                        "1": {
                            "name": "Cappuccino",
                            "sate": 1
            
                        },
                        "2": {
                            "name": "Latte",
                            "sate": 1
            
                        }
                    }
                }
            }'
        ));
    }

    public function getMarker(){
        $machines = Machine::all();
        $markers = array(); 
        foreach($machines as $machine){
            $markers[] = array(
                "id"=>$machine->id,
                "name"=>$machine->name,
                "code"=>$machine->code,
                "lat"=>$machine->latitude,
                "lon"=>$machine->longitude,
                "author"=>$machine->author,
                "state"=>State::where('id_machine',$machine->id)->first()->state
            );
        }
        return json_encode($markers);
    }
   
    public static function updateMachine(Request $request){
        $machine = Machine::where('id',$request->id)->first();
        $products = json_decode(State::where('id_machine',$machine->id)->first()->state,true);
        return view('machineUpdate',array('machine'=>$machine,"products"=>$products["product"]))->render();
    }
    public static function updateMachinePost(Request $request){
        $machine = Machine::where('id',$request->id)->first();
        $machine->name = $request->name;
        $machine->code = $request->code;
        $machine->save();
        $state = State::where('id_machine',$request->id)->first();
        $state->state = $request->state;
        $state->save();
    }
}
