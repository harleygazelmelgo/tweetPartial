<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetController extends Controller
{
    private $tweets = [

        [
            'author' => 'Harley Melgo',
            'content' => 'This is my first tweet'
        ],
        [
            'author' => 'Harley Melgo',
            'content' => 'This is my second tweet'
        ],
        [
            'author' => 'Harley Melgo',
            'content' => 'This is my third tweet'
        ],
        [
            'author' => 'Harley Melgo',
            'content' => 'This is my fourth tweet'
        ],
        [
            'author' => 'Harley Melgo',
            'content' => 'This is my fifth tweet'
        ],

    ];


    function show() {
        return view("showTweets", ["allTweets" => $this->tweets]);
    }

    function showTweet($id) {
        if($id > sizeOf($this->tweets)) {
            return view("tweetError");
        }
        return view("showTweets", ["allTweets" => [$this->tweets[$id]]]);
    }



}
