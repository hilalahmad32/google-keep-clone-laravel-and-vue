<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Models\Achive;
use App\Models\Bin;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchiveController extends Controller
{


    public function getAchiveNotes()
    {
        $achives = Achive::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        return response()->json(["achieve"=>$achives]);
    }

    public function deleteAchive($id)
    {
        $bins = new Bin();
        $achives = Achive::findOrFail($id);
        $bins->user_id = $achives->user_id;
        $bins->title = $achives->title;
        $bins->notes = $achives->notes;
        $result = $bins->save();
        $achives->delete();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    // so add here some code like a recycle bin
    public function rachieve($id)
    {
        $notes=new Note();
        $achives=Achive::findOrFail($id);
        $notes->user_id=$achives->user_id;
        $notes->title=$achives->title;
        $notes->notes=$achives->notes;
        $result=$notes->save();
        $achives->delete();
        if($result){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }

}
