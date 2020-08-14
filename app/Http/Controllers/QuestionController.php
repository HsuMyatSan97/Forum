<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->query('category')){

            $category = Category::where('name',$request->query('category'))->first();
            $questions = $category->questions()->latest()->paginate(8);
        }else{
            $questions= Question::latest()->paginate(8);
        }

       $random = Question::all()->random();
       $categories = Category::all();
       return view('question/index',compact('questions','random','categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->get();
        return view('question/create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = Question::create([
            'title'=>$request->title,
            'description'=> $request->description,
            'user_id'=>Auth::user()->id
    ]);
        $question->categories()->attach($request->category);
        return redirect(route('question.index'))->with('message','Your question has been submited');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::Where('id',$id)->first();
        return view('question/show',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $question = Question::where('id',$id)->first();
         $this->authorize('update',$question);
         $categories = Category::all();
         return view('question/edit',compact('question','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

          $question = Question::where('id',$id)->first();
          $this->authorize('update',$question);
          $question->update([
            'title' => $request->title,
             'description' => $request->description,
        ]);

        $question->categories()->sync($request->category);
        return redirect(route('question.index'))->with('message','Your question has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question:: where('id',$id)->first();
        $this->authorize('delete',$question);
        $question->delete();
       return redirect(route('question.index'))->with('message','Your question has been deleted');
    }
}
