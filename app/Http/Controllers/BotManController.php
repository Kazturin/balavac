<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function ($botman, $message) {

            if ($message == 'start') {
                $this->askMain($botman);
            } else {
                $botman->reply(__("chatbot.start"));
            }
        });

         $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function askMain($botman)
    {
        $q1_buttons = [
            Button::create(__("chatbot.q1"))->value(1),
            Button::create(__("chatbot.q2"))->value(2),
            Button::create(__("chatbot.q3"))->value(3),
        ];
        
        $q1 = Question::create(__("chatbot.welcome"))
        ->addButtons($q1_buttons);

        $q1_2_buttons = [
            Button::create(__("chatbot.q1_bt1"))->value(1),
            Button::create(__("chatbot.q1_bt2"))->value(2),
            Button::create(__("chatbot.q1_bt3"))->value(3),
        ];


        $q1_2 = Question::create(__("chatbot.q1_1"))
        ->addButtons($q1_2_buttons);


        $q2_buttons = [
            Button::create(__("chatbot.q2_bt1"))->value(1),
            Button::create(__("chatbot.q2_bt2"))->value(2),
            Button::create(__("chatbot.q2_bt3"))->value(3),
        ];

        $q2 = Question::create(__("chatbot.q2_2"))
        ->addButtons($q2_buttons);

        $q3_buttons = [
            Button::create(__("chatbot.q3_bt1"))->value(1),
            Button::create(__("chatbot.q3_bt2"))->value(2),
            Button::create(__("chatbot.q3_bt3"))->value(3),
        ];

        $q3 = Question::create(__("chatbot.q3_3"))
        ->addButtons($q3_buttons);
        

        $botman->ask($q1, function (Answer $answer) use($q1_2,$q2,$q3) {


            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                case 1:
                    $this->ask($q1_2, function (Answer $answer)
                    {
                        $q1_3_buttons = [
                            Button::create(__("chatbot.q1_bt1_answer_q1"))->value(1),
                            Button::create(__("chatbot.q1_bt1_answer_q2"))->value(2),
                        ];
                
                
                        $q1_3 = Question::create(__("chatbot.more"))
                        ->addButtons($q1_3_buttons);
                        switch ($answer->getValue()) {
                            case 1: 
                                $this->say(__("chatbot.q1_bt1_answer"));
                                $this->ask($q1_3, function (Answer $answer){
                                    switch ($answer->getValue()) {
                                        case 1:  $this->say(__("chatbot.q1_bt1_answer_q1_ans")); break;
                                        case 2:  $this->say(__("chatbot.q1_bt1_answer_q1_ans")); break;
                                    }
                                });
                            break;
                            case 2: 
                                $this->say(__("chatbot.q1_bt2_answer"));
                                $this->ask($q1_3, function (Answer $answer){
                                    switch ($answer->getValue()) {
                                        case 1:  $this->say(__("chatbot.q1_bt2_answer_q1_ans")); break;
                                        case 2:  $this->say(__("chatbot.q1_bt2_answer_q2_ans")); break;
                                    }
                                });
                            break;
                            case 3: 
                                $this->say(__("chatbot.q1_bt3_answer"));
                                $this->ask($q1_3, function (Answer $answer){
                                    switch ($answer->getValue()) {
                                        case 1:  $this->say(__("chatbot.q1_bt3_answer_q1_ans")); break;
                                        case 2:  $this->say(__("chatbot.q1_bt3_answer_q1_ans")); break;
                                    }
                                });
                            break;
                        }
                    });
                    break;
                case 2:
                    $this->ask($q2, function (Answer $answer)
                    {
                        switch ($answer->getValue()) {
                            case 1: 
                                $this->say(__("chatbot.q2_bt1_ans"));
                                break;
                            case 2: 
                                $this->say(__("chatbot.q2_bt2_ans"));
                                break;  
                            case 3: 
                                $this->say(__("chatbot.q2_bt3_ans"));
                                break;      
                        }
                    });
                        break;
                 case 3:
                       $this->ask($q3, function (Answer $answer)
                            {
                                switch ($answer->getValue()) {
                                    case 1: 
                                        $this->say(__("chatbot.q3_bt1_ans"));
                                        break;
                                    case 2: 
                                        $this->say(__("chatbot.q3_bt2_ans"));
                                        break;  
                                    case 3: 
                                        $this->say(__("chatbot.q3_bt3_ans"));
                                        break;      
                                }
                            });
                                break;        
                }
            }

            // $this->ask($question2,function (Answer $answer) {

            //     $test1 = $answer->getValue();
    
            //     $this->say('ppppp');
            // });
        });
    }
}
