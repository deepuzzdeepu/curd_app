<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function upload(Request $request){
        $request->validate([
            'image'=>'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
    
            return "Success";
        }


        
        else{
            return "Failed";
        }

    }
}





