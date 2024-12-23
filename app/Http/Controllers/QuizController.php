<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Pretest_result;
use App\Http\Requests\StoreQuizRequest;
use App\Http\Requests\UpdateQuizRequest;
use App\Models\Ecourse;
use Auth;


class QuizController extends Controller
{
   public function index(){
      $quizzes = Quiz::all();
      return view('quiz.index', compact('quizzes'));
   }

   public function submitquiz(Request $request){
       
    //    dd($request->all);
       $request->validate([
         'question1' => 'required|in:a,b,c,d',
        
     ]);

     $user_id = Auth::id();
     $ecourse_id = intval($request->input('ecourse_id'));
     

    
     $score = $this->calculateScore($request->all());

     Pretest_result::create([
        'user_id' => $user_id,
        'ecourse_id' => $ecourse_id,
        'nilai' => $score
    ]);
    
    

    
    return back();
   }

   private function calculateScore($answers)
    {
        
        $score = 0;

        $quizzes = Quiz::all();

        for ($index = 1; $index <= 10; $index++) {
            $correctAnswer = $quizzes[$index - 1]->jawabanbenar;
            $userAnswer = $answers['question' . $index];

            if ($correctAnswer === $userAnswer) {
                $score+=10;
            }
        }

        return $score;
    }

}
