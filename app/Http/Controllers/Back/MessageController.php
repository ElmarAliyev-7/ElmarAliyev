<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function checkSeened($id)
    {
        Message::where('id',$id)->update(['seen' => 1]);
        return redirect()->route('admin.message')->with('success','Checked like seen');
    }

    public function deleteMessage($id)
    {
        Message::find($id)->delete();
        return redirect()->back()->with('success','Message deleted successfully');
    }
}
