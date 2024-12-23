<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quizposttest;
use App\Models\Posttest_result;
use App\Http\Requests\StoreQuizposttestRequest;
use App\Http\Requests\UpdateQuizposttestRequest;
use App\Models\Ecourse;
use Auth;

class QuizposttestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quizzesposttest = Quizposttest::all();
        return view('quiz.index', compact('quizzesposttest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuizposttestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuizposttestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quizposttest  $quizposttest
     * @return \Illuminate\Http\Response
     */
    public function show(Quizposttest $quizposttest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quizposttest  $quizposttest
     * @return \Illuminate\Http\Response
     */
    public function edit(Quizposttest $quizposttest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuizposttestRequest  $request
     * @param  \App\Models\Quizposttest  $quizposttest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQuizposttestRequest $request, Quizposttest $quizposttest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quizposttest  $quizposttest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quizposttest $quizposttest)
    {
        //
    }

    public function submitquizposttest(Request $request){
       
        //    dd($request->all);
           $request->validate([
             'question1' => 'required|in:a,b,c,d',
            
         ]);

         
    
         $user_id = Auth::id();
         $ecourse_id = intval($request->input('ecourse_id'));
         
    
        
         $score = $this->calculateScore($request->all());

         // Gunakan model Posttest_result
         Posttest_result::create([
             'user_id' => $user_id,
             'ecourse_id' => $ecourse_id,
             'nilai' => $score
         ]);
     
         // ...
     
         return back();
        // dd($request);
            
       }
    
       private function calculateScore($answers)
        {
            
            $score = 0;

            $quizzes = Quizposttest::all();
    
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
