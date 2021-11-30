<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Models\Bin;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BinController extends Controller
{
    public function getBinNotes()
    {
        $bins=Bin::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
        return response()->json(['bins'=>$bins]);
    }

    public function recycleBin($id)
    {
        $notes=new Note();
        $bins=Bin::findOrFail($id);
        $notes->user_id=$bins->user_id;
        $notes->title=$bins->title;
        $notes->notes=$bins->notes;
        $result=$notes->save();
        $bins->delete();
        if($result){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }

    public function fullDeleteBin($id)
    {
        $bins=Bin::findOrFail($id);
        $result=$bins->delete();
        if($result){
            return response()->json(['success'=>true]);
        }else{
            return response()->json(['success'=>false]);
        }
    }
}
