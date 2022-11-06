<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create(Request $request)
    {
        Question::create($request->all());
        return redirect()->back()->with('success', 'Question added successfully');
    }

    public function delete($id)
    {
        Question::find($id)->delete();
        return redirect()->back()->with('success', 'Question deleted successfully');
    }
}
