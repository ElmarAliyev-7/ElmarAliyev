<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{

    public function show($id)
    {
        Message::where('id', $id)->update(['seen' => 1]);
        $message = Message::find($id);
        return view('back.messages.show',compact('message'));
    }

    public function delete($id)
    {
        Message::find($id)->delete();
        return redirect()->back()->with('success','Message deleted successfully');
    }

    protected function bulkDelete()
    {
        DB::table('messages')->delete();
        return redirect()->back()->with('success', 'Messages deleted');
    }
}
