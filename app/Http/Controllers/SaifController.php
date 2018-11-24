<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Saif;

class SaifController extends Controller
{  

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function Store(Request $request)
    {
    	 $validatedData = $request->validate([
        'title' => 'required|unique:saifs|max:255',
        'tag' => 'required',
        'description' => 'required',
        'author' => 'required|min:4|max:20'
    	]);
    	

    	$saif=new Saif;
    	$saif->title=$request->title;
    	$saif->author=$request->author;
    	$saif->tag=$request->tag;
    	$saif->description=$request->description;
    	$insert=$saif->save();

    	if ($insert) 
    	{
    		$notification=array(
    			'message'=>'Congrats !! Post Added Successfully.',
    			'alert-type'=>'success'
    		);
    		return Redirect()->back()->with($notification);
    	}
    	else
    	{
            $notification=array(
                'message'=>'Post Not Added Successfully.',
                'alert-type'=>'info'
            );
    		return Redirect()->back()->with($notification);
    	}

    }

    public function Delete($id)
    {
        $saif= Saif::find($id);
        //print_r($saif);
        $delete=$saif->delete();

        if ($delete) {
            $notification=array(
                'message'=>'Post Delete Successfully',
                'alert-type'=>'info'
            );
         return Redirect()->back()->with($notification);
        }
        else
        {
            return Redirect()->back();
        }
    }

   
   public function Edit($id)
    {

        $saif=Saif::findorfail($id);
        //print_r($saif);
        return view('edit_post', compact('saif'));
    }

    public function Update(Request $request, $id)
    {

        $saif=Saif::findorfail($id);
        $saif->title=$request->title;
        $saif->author=$request->author;
        $saif->tag=$request->tag;
        $saif->description=$request->description;
        $update=$saif->save();

        if ($update) 
        {
            $notification=array(
                'message'=>'Congrats !! Post Updated Successfully.',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
        else
        {
            $notification=array(
                'message'=>'Post Not Updated Successfully.',
                'alert-type'=>'info'
            );
            return Redirect()->back()->with($notification);
        }

    }




}
