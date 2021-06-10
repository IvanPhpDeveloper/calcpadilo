<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;


class CommentsController extends Controller
{
    public function store(Request $request)
    {


        $data = $request->all();


        /*  Новая услуга (товар)
         *  $bitrix = new Bitrix('WEBHOOK');
         *  $id = $bitrix->addItems(['UF_CRM_asdasdasd' => $request->title;
         */
         $comment = new Comment();

        $comment->text = $data['text'];
        // $services->bitrixID = $id;

        $comment->save();

        return redirect()->back();
    }


}
