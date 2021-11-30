<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Models\Achive;
use App\Models\Bin;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function store(Request $request)
    {
        $notes = new Note();
        $notes->user_id = Auth::user()->id;
        $notes->title = $request->title;
        $notes->notes = $request->notes;
        $result = $notes->save();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function getNotes()
    {
        $notes = Note::where('user_id', Auth::user()->id)->orderBy('id','DESC')->with('user')->get();
        return response()->json(['notes'=>$notes]);
    }

    public function editNotes($id)
    {
        $notes = Note::findOrFail($id);
        return response()->json($notes);
    }

    public function cloneNotes($id)
    {
        $notes=Note::findOrFail($id);
        $new_notes=$notes->replicate();
        $new_notes->push();
    }

    public function updateNotes(Request $request, $id)
    {
        $notes=Note::findOrFail($id);
        $notes->title=$request->title;
        $notes->notes=$request->notes;
        $result=$notes->save();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }

    }


    // public function deleteNotes($id)
    // {
    //     $notes=Note::findOrFail($id);
    //     $result=$notes->delete();
    //     if ($result) {
    //         return response()->json(['success' => true]);
    //     } else {
    //         return response()->json(['success' => false]);
    //     }

    // }

    public function addBin($id)
    {
        $bins=new Bin();
        $notes=Note::findOrFail($id);
        $bins->user_id=$notes->user_id;
        $bins->title=$notes->title;
        $bins->notes=$notes->notes;
        $result=$bins->save();
        $notes->delete();
        if($result){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }

    public function addAchive($id)
    {
        $achives=new Achive();
        $notes=Note::findOrFail($id);
        $achives->user_id=$notes->user_id;
        $achives->title=$notes->title;
        $achives->notes=$notes->notes;
        $result=$achives->save();
        $notes->delete();
        if($result){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }
}
