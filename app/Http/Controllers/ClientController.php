<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        $clients=Client::all();
        return view('list',compact('clients'));
    }
    public function insert(Request $req)
    {
        
        $req->validate([
            'c_name' => 'required',
            'c_address'=>'required',
            'c_mobile' => 'required',
            'c_gender' => 'required',
            'c_image' => 'required'
        ]);

        $clients=new Client;
        
        $clients->c_name=$req->input('c_name');
        $clients->c_address=$req->input('c_address');
        $clients->c_mobile=$req->input('c_mobile');
        $clients->c_gender=$req->input('c_gender');
        //$clients->c_image=$req->c_image;
        if($req->hasfile('c_image'))
        {
            $file = $req->file('c_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/clients/',$filename);
            $clients->c_image = $filename;
        }
        $clients->save();
        return redirect('list')->with('success','Success ! Client Added Successfully');
    }
    public function edit($id)
    {
        $clients=Client::find($id);
        return view('update',compact('clients'));
    }
    public function update(Request $req,$id)
    {
        $req->validate([
            'c_name' => 'required',
            'c_address' => 'required',
            'c_mobile' => 'required',
            'c_gender' => 'required',
            'c_image' => 'required'

        ]);
        $clients=Client::find($id);
        $clients->c_name=$req->get('c_name');
        $clients->c_address=$req->get('c_address');
        $clients->c_mobile=$req->get('c_mobile');
        $clients->c_gender=$req->get('c_gender');
        //$clients->c_image=$req->c_image;
        if($req->hasfile('c_image'))
        {
            $file = $req->file('c_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/clients/',$filename);
            $clients->c_image = $filename;
        }
        $clients->save();
        return redirect('list')->with('success','Success ! Client updated successfully');


    }
    public function destroy($id)
    {
        $clients=Client::destroy($id);
        return redirect('list')->with('success','Delete ! Record Deleted');
    }
    //
}
