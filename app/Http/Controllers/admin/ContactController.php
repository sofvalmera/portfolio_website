<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;




class ContactController extends Controller
{
    //
    public function index(Request $request){
         $contacts= Contact::latest();
         if(!empty($request->get('keyword'))){

            $contacts= $contacts->where('status','like','%'.$request->get('keyword').'%');
         }


        $contacts= $contacts->paginate(10);
        return view('admin.contact.list',compact('contacts'));

    }
     public function create(){
        return view('admin.contact.create');

    }
     public function store(Request $request){
        $validator =Validator::make($request->all(),[
          
        ]);
        
        if($validator->passes()){
            $contact=new Contact();
            $contact->status = $request->status;
            $contact->save();

      

            $request->session()->flash('success',' Added Successfully');
            return response()->json([
                'status' => true,
                'message' => ' Added Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function edit($contactId, Request $request){

        $contact=Contact::find($contactId);

        if(empty($contact)){
            return redirect()->route('contacts.index');
        }
        return view('admin.contact.edit',compact('contact'));


    }
     public function update($contactId, Request $request){
        $contact=Contact::find($contactId);

        if(empty($contact)){
            $request->session()->flash('error',' not Found');
            return response()->json([
                'status' => false,
                'notFound' => true,
                'message' => ' not found'
            ]);
        }
        $validator =Validator::make($request->all(),[
           
        ]);
        
        if($validator->passes()){
            $contact->status = $request->status;
            $contact->save();

      

           

            $request->session()->flash('success',' Updated Successfully');
            return response()->json([
                'status' => true,
                'message' => ' Updated Successfully'
            ]);
     
        }else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }
     public function destroy($contactId, Request $request){
        $contact=Contact::find($contactId);

        if(empty($contact)){
            $request->session()->flash('error',' not found');
            return response()->json([
                'status' => true,
                'message' => ' not found'
            ]);
    
            // return redirect()->route('categories.index');
        }


     
        $contact->delete();
        $request->session()->flash('success',' deleted successfully');
        return response()->json([
            'status' => true,
            'message' => ' Deleted Successfully'
        ]);

    }

}
