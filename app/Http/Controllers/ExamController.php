<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{User, Quiz, Result, Question, Answer};

class ExamController extends Controller
{
    public function create()
    {
        return view('backend.exam.create', [
            'users' => User::where('is_admin', '0')->get(),
            'quizzes' => Quiz::all(),
        ]);
    }

    public function assignExam(Request $request)
    {
        $data = $request->validate([
            'quiz_id' => 'required',
            'user_id' => 'required',
        ]);
        $quizId = $data['quiz_id'];
        $quiz = Quiz::find($quizId);
        $userId = $data['user_id'];
        $quiz->users()->syncWithoutDetaching($userId);
        return redirect()->back()->with('success', 'Exam assigned to user successfully');
    }

    public function userExam()
    {
        return view('backend.exam.index', [
            'quizzes' => Quiz::get(),
        ]);
    }
    public function removeExam(Request $request)
    {
        $userId = $request->get('user_id');
        $quizId = $request->get('quiz_id');
        $quiz = Quiz::find($quizId);
        $result = Result::where('quiz_id', $quizId)->where('user_id', $userId)->exists();
        if ($result) {
            return redirect()->back()->with('success', 'The user still in the quiz');
        } else {
            $quiz->users()->detach($userId);
            return redirect()->back()->with('success', 'The user successfully unassigned from Exam');
        }
    }

    public function quizQuestions(Request $request, $quizId)
    {
        $user = auth()->user()->id;

        //check if user has been assigned a quiz
        $userId = DB::table('quiz_user')->where('user_id', $user)->pluck(
            'quiz_id'
        )->toArray();
        if (!in_array($quizId, $userId)) {
            return redirect()->to('/home')->with('success', 'You are not assigned this exam');
        }

        $quiz = Quiz::find($quizId);
        $time = Quiz::where('id', $quizId)->value('minutes');
        $quizQuestions = Question::where('quiz_id', $quizId)->with('answers')->get();
        $userResult = Result::where(['user_id' => $user, 'quiz_id' => $quizId])->get();

        //has user played quiz
        $wasCompleted = Result::where('user_id', $user)->whereIn('quiz_id', (new Quiz)->hasQuizAttempted())->pluck('quiz_id')->toArray();
        if (in_array($quizId, $wasCompleted)) {
            return redirect()->to('/home')->with('success', 'You already participated in this exam');
        }

        return view('quiz', compact('quiz', 'time', 'quizQuestions', 'userResult'));
    }

    public function postQuiz(Request $request)
    {
        $quizId = $request['quizId'];
        $questionId = $request['questionId'];
        $answerId = $request['answerId'];

        $user = auth()->user();
        return $userQuestionAnswer = Result::updateOrCreate(
            ['user_id' => $user->id, 'quiz_id' => $quizId, 'question_id' => $questionId],
            ['answer_id' => $answerId]
        );
    }

    public function viewResult($userId, $quizId)
    {
        $result = Result::where('user_id', $userId)->where('quiz_id', $quizId)->get();
        return view('result-detail', compact('results'));
    }
    public function result()
    {
        return view('backend.exam.index', [
            'quizzes' => Quiz::get(),
        ]);
    }
    public function userQuizResult($userId, $quizId)
    {
        $result = Result::where('user_id', $userId)->where('quiz_id', $quizId)->get();
        $totalQuestion = Question::where('quiz_id', $quizId)->count();
        $attemptQuestion = Result::where('quiz_id', $quizId)->where('user_id', $userId)->count();
        $quiz = Quiz::where('id', $quizId)->get();
        $ans = [];
        foreach ($result as $answer) {
            array_push($ans, $answer->answer_id);
        }
        $userCorrectedAnswer = Answer::whereIn('id', $ans)->where('is_correct', 1)->count();
        $userWrongAnswer = $totalQuestion - $userCorrectedAnswer;
        if ($attemptQuestion) {
            $percentage = ($userCorrectedAnswer / $totalQuestion) * 100;
        } else {
            $percentage=0;
        }
        $percentage = ($userCorrectedAnswer / $totalQuestion) * 100;
        return view('backend.result.result', compact('results', 'totalQuestions', 'attemptedQuestion', 'userCorrectedAnswer', 'userWrongAnswer', 'percentage', 'quiz'));
    }
}
