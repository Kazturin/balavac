<?php
namespace App\BotmanConversation;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class FirstConversation extends Conversation
{
    protected $firstname;

    protected $email;

    public function askFirstQuestion()
    {
        $q1_buttons = [
            Button::create('Сәбилер (1 жасқа дейін)')->value(1),
            Button::create('1 жастан 6 жасқа дейінгі балалар')->value(2),
            Button::create('6 жастан 18 жасқа дейінгі балалар')->value(3),
        ];
        
        $q1 = Question::create('Керемет! Бастау үшін балаңыздың жасын анықтаңыз:')
        ->addButtons($q1_buttons);

        $this->ask($q1, function(Answer $answer) {

            if ($answer->isInteractiveMessageReply()) {
                switch ($answer->getValue()) {
                case 1:
                    $this->say("teat");
                    break;
                case 2:
                    $this->say('selected button2');
                        break;
                }
            }
        });
    }

    public function askEmail()
    {
        $this->ask('One more thing - what is your email?', function(Answer $answer) {
            // Save result
            $this->email = $answer->getText();

            $this->say('Great - that is all we need, '.$this->firstname);
        });
    }

    public function run()
    {
      //  $this->say("");
        $this->askFirstQuestion();
    }
}