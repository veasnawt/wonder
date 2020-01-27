<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Question;
use App\Answer;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $questions = Question::latest('id')->get();
        $answers = Answer::all();
        return view('home', compact('users', 'questions', 'answers'));
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'title' => 'required',
            'image' => 'image',
            ]);         
            
            $question = new Question();
                $question->title = $request['title'];
                $question->user_id = Auth::user()->id;
                if($request->image != ""){
                    $image = $request->file('image');
                    $new_image_name = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('image'), $new_image_name);
                    $question->image = $new_image_name;
                }
            $question->save();
            return redirect('/home');
    }
}
