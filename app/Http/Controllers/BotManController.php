<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{

    public function handle()
    {
        $botman = app('botman');

        $botman->hears('Hello BotMan!', function($bot) {
            $bot->reply('Hello!');
            $bot->ask('Whats your name?', function($answer, $bot) {
                $bot->say('Welcome '.$answer->getText());
            });
        });

        $botman->listen();
        return view('botchat');
    }

}
