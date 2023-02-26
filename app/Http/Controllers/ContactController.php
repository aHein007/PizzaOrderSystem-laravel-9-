<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactValidation;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // admin contact
    public function contactPage(Request $request){
        $allContacts =Contact::orderBy('created_at','desc')
                                ->searchContact($request->search_contact)
                                ->paginate(6);
        return view('myViews.admin.contact.contact',compact('allContacts'));
    }

    //user contact
    public function contact(){
        $allContacts =Contact::get();
        return view('myViews.user.contactPage.contactPage',compact('allContacts'));
    }

    public function sendContact(ContactValidation $request,$id){
       $contact = $this->getContactData($request);

       Contact::where('id',$id)->create($contact);

      return back()->with('sendContact','Your contact have been send to our Team!.Thanks');
    }


    private function getContactData($request){
       return  [
        'name' =>$request->name,
        'email' =>$request->email,
        'message' =>$request->message
       ];
    }
}
