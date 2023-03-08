<?php

namespace App\Http\Controllers;

use App\Helper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\RestrictedWord;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class RestrictionsController extends Controller
{

    public function __construct() {

    }

    public function settingsRestrictions(){
        $posts    = RestrictedWord::where('type', 'post')->get()->pluck('word');
        $comments = RestrictedWord::where('type', 'comment')->get()->pluck('word');
        $messages = RestrictedWord::where('type', 'message')->get()->pluck('word');

        return view('admin.restriction', compact('posts', 'comments', 'messages'));
    }

    public function saveRestrictions(Request $request){
        RestrictedWord::truncate();

        $posts = explode(";", $request->post_restrictions);
        $comments = explode(";", $request->comment_restriction);
        $messages = explode(";", $request->message_restriction);

        foreach($posts as $post){
            if($post != '' && $post != ';'){
                $save_p = new RestrictedWord;
                $save_p->word = $post;
                $save_p->type = 'post';
                $save_p->save();
            }
        }

        foreach($comments as $comment){
            if($comment != '' && $comment != ';'){
                $save_c = new RestrictedWord;
                $save_c->word = $comment;
                $save_c->type = 'comment';
                $save_c->save();
            }
        }

        foreach($messages as $message){
            if($message != '' && $message != ';'){
                $save_m = new RestrictedWord;
                $save_m->word = $message;
                $save_m->type = 'message';
                $save_m->save();
            }
        }
		Session::flash('success_message',  __('general.send_success'));
        return redirect()->route('setting.restrictions');
    }


}
