<?php

namespace App\Livewire;

use App\Models\Answer;
use App\Models\TestResult;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Message extends ModalComponent
{
    public $questionCount;
    public $result;
    public $persent;
    public $resultDescription;

    public function mount()  
    {
        //$this->result = Answer::where(["id"=> $answersIDs,"correct"=>true])->count();
        $this->resultDescription = TestResult::query()->where('from','<=',$this->persent)->where('to','>=',$this->persent)->first();
    }
    public function render()
    {
        return view('livewire.message');
    }
}
