<?php

namespace App\Http\Controllers;


use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function store(Request $request)
    {

        $data = $request->all();


        /*  Новая услуга (товар)
         *  $bitrix = new Bitrix('WEBHOOK');
         *  $id = $bitrix->addItems(['UF_CRM_asdasdasd' => $request->title;
         */


        $contact = new Contact();
        $contact->name = $data['name'];
        $contact->number  = $data['number'];
        $contact->email  = $data['email'];
        // $services->bitrixID = $id;

        $contact->save();

        return redirect()->back();
    }
}
