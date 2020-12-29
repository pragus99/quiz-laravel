<?php

namespace App\Http\Controllers;

use App\Models\{Quiz,Answer,Question};
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.question.index', [
            'questions' => Question::orderBy('created_at', 'desc')->with('quiz')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.question.create', [
            'quizzes' => Quiz::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
        $data = $request->all();
        $data['quiz_id'] = $data['quiz'];
        $question = Question::create($data);
        $this->storeAnswer($data,$question);

        session()->flash('success', 'Question created successfully');
        return redirect('question/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        return view('backend.question.show', compact('question')  );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        return view('backend.question.edit', [
            'question' => $question,
            'quizzes' => Quiz::all()
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        $data = $request->all();

        $question = Question::find($id);
        $question->question = $data['question'];
        $question->quiz_id = $data['quiz'];
        $question->save();

        $answer = Answer::where('question_id', $question->id)->delete();
        $this->storeAnswer($data,$question);

        session()->flash('success', 'Question update succesfully');
        return redirect()->route('question.show', $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Answer::where('question_id', $id)->delete();
        Question::where('id', $id)->delete();
        session()->flash('success', 'Question deleted succesfully');
        return redirect('question');
    }

    public function storeAnswer($data, $question)
    {
        foreach ($data['options'] as $key => $option) {
            $is_correct=false;
            if($key == $data['correct_answer'])
            {
                $is_correct=true;
            }
            $answer = Answer::create([
                'question_id' => $question->id,
                'answer' => $option,
                'is_correct'=> $is_correct
            ]);
        }
    }
}
