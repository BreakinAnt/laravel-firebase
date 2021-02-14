<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

use App\Http\Helpers\BodyChecker;

class BackController extends Controller {
    public function getUsers(){
        Log::channel('stderr')->info('On BackController.getUsers()');

        $response = Http::get(env('FIREBASE_DB').'.json');
        if($response->failed() != 0){
            return "Something went wrong.";
        }
        return $response;
    }

    public function getUser($id){
        Log::channel('stderr')->info("On BackController.getUser($id)");

        $response = Http::get(env('FIREBASE_DB').'/'.$id.'.json');
        if($response->failed() != 0){
            return "Something went wrong.";
        }
        return $response;
    }

    public function postUser(Request $req){
        Log::channel('stderr')->info("On BackController.postUser()");
        
        $author = $req->input("author");
        $body = $req->input("body");
        $title = $req->input("title");

        if(!BodyChecker::checkBodyAll($author, $body, $title)){
            return "Missing body data.";
        }

        $response = Http::post(env('FIREBASE_DB').'.json', [
            "author" => $author,
            "body" => $body,
            "title" => $title
        ]);

        if($response->failed() != 0){
            return "Something went wrong.";
        }
        return $response;
    }

    public function putUser(Request $req, $id){
        Log::channel('stderr')->info("On BackController.putUser()");

        $author = $req->input("author");
        $body = $req->input("body");
        $title = $req->input("title");

        if(!BodyChecker::checkBodyAll($author, $body, $title)){
            return "Missing body data.";
        }

        $response = Http::put((env('FIREBASE_DB').'/'.$id.'.json'), [
            "author" => $author,
            "body" => $body,
            "title" => $title
        ]);

        if($response->failed() != 0){
            return "Something went wrong.";
        }
        return $response;
    }
    
    public function deleteUser($id){
        Log::channel('stderr')->info("On BackController.putUser()");

        $response = Http::delete(env('FIREBASE_DB').'/'.$id.'.json');

        if($response->failed() != 0){
            return "Something went wrong.";
        }
        return $response;
    }
}