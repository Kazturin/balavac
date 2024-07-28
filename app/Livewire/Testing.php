<?php

namespace App\Livewire;

use App\Models\Question;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use App\Models\Answer;
use App\Models\TestResult;

class Testing extends Component
{
    public $currentQuestionIndex = 0;
    public $currentQuestion;
    public $questions;
    public $userAnswers;
    public $selectedAnswers = [];

    public $testComplete = false;

    public function mount(){
        $this->questions = Question::with('answers')->whereHas('answers')->where('language',app()->getLocale())->orderBy('number')->get()->toArray();
       
        if(!empty($this->questions))
        {
            $this->currentQuestion = $this->questions[0];
        //    $this->currentQuestion['index'] = 0;
        }
      
        $this->userAnswers = collect([]);
    }
    public function render()
    {
        return view('livewire.testing');
    }

    public function selectQuestion(int $index)
    {   
        if( $index<$this->currentQuestionIndex)
        {
            $this->currentQuestion = $this->questions[$index];
            $this->currentQuestionIndex = $index;
        }
    }

    public function nextQuestion()
    {
        if($this->currentQuestionIndex+1<=(count($this->questions)-1))
        {
            $this->currentQuestionIndex = $this->currentQuestionIndex + 1; 
            $this->currentQuestion = $this->questions[$this->currentQuestionIndex];
            $this->testComplete = $this->currentQuestionIndex==(count($this->questions)-1);
        }
    }

    public function prevQuestion()
    {
        if($this->currentQuestionIndex>0)
        {
            $this->currentQuestionIndex = $this->currentQuestionIndex-1; 
            $this->currentQuestion = $this->questions[$this->currentQuestionIndex];
          //  $this->testComplete = $this->currentQuestionIndex==(count($this->questions)-1);
        }
    }

    public function selectAnswer($answer){
        $this->selectedAnswers[$answer->question_id] = $answer->id;
    }

    public function completeTest()
    {
        $questionsCount = count($this->questions);
        $result = Answer::whereIn('id', $this->selectedAnswers)->where('correct',true)->count();
        $persent = ($result*100)/ $questionsCount;
        
        // $resultDescription = TestResult::query()->where
       // dd($this->selectedAnswers);
       // dd();
        $this->dispatch('openModal', 'message', [ 'questionCount'=> $questionsCount,'result'=> $result,'persent'=>$persent]);
    }

}
