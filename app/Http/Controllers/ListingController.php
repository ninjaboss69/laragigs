<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Session\Session;

class ListingController extends Controller
{
    //
    public function index(){
       // dd(request('tag'));
        return view('listings/index',[
            'listings'=>Listing::latest()->filter(request(['tag','search']))->paginate(6),
         ]);
    }

    public function show(Listing $listing){

        return view("listings/show",[
            'listing'=>$listing
      ]);
    }

    public function create(){
       return view("listings.create");
    }

    public function store(Request $request){
     //dd($request->file('logo')->store());
       $formFileds = $request->validate([
        'title' => 'required',
        'company' => ['required', Rule::unique('listings','company')],
        'location'=>'required',
        'website'=>'required',
        'email'=>['required','email'],
        'tags'=>'required',
        'description' =>'required'
       ]);
       if($request->hasFile('logo')){
         $formFileds['logo']=$request->file('logo')->store('logos','public');
       }
       $formFileds['user_id']=auth()->id();
       Listing::create($formFileds);
       //Session::flash('message','listing created');
       return redirect('/')->with('message','Listing Created successfully!');
    }

    public function edit(Listing $listing){
      //dd($listing->title);
      return view('listings.edit',['listing'=>$listing]);
    }

    public function update(Request $request,Listing $listing){
      
      //Make sure login user is owner

      if($listing->user_id != auth()->id()){
        abort(403,'Unauthorized Action! If you think this is mistake, contact to Admin Team');
      }
        $formFileds = $request->validate([
         'title' => 'required',
         'company' => ['required'],
         'location'=>'required',
         'website'=>'required',
         'email'=>['required','email'],
         'tags'=>'required',
         'description' =>'required'
        ]);
        if($request->hasFile('logo')){
          $formFileds['logo']=$request->file('logo')->store('logos','public');
        }
        $listing->update($formFileds);
       // Listing::create($formFileds);
        //Session::flash('message','listing created');
        return back()->with('message','Listing updated successfully!');
     }

     public function delete(Listing $listing){
      if($listing->user_id != auth()->id()){
        abort(403,'Unauthorized Action! If you think this is mistake, contact to Admin Team');
      }
      $listing->delete();
      return redirect('/')->with("message","Listing deleted successfully");
     }
     

     public function manage(){
        return view('listings.manage',['listings'=>auth()->user()->listings()->get()]);
     }

} 
