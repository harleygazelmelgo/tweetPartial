<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TweetController extends Controller
{
    // private $tweets;

    // public function __construct() {
    //     $this->tweets = DB::select('select * from tweet');
    // }
    // // = [

    // //     [
    // //         'author' => 'HGM',
    // //         'content' => 'This is my first tweet'
    // //     ],
    // //     [
    // //         'author' => 'HGM',
    // //         'content' => 'This is my second tweet'
    // //     ],
    // //     [
    // //         'author' => 'PLR-M',
    // //         'content' => 'This is my first tweet'
    // //     ],
    // //     [
    // //         'author' => 'PLR-M',
    // //         'content' => 'This is my second tweet'
    // //     ],
    // //     [
    // //         'author' => 'TR-M',
    // //         'content' => 'This is my first tweet'
    // //     ],

    // // ];


    function show() {
        $tweets = DB::table('tweet')->get();
        return view("showTweets", ["allTweets" => $tweets]);
    }

    function showTweet($id) {
        $tweets = DB::table('tweet')->get();
        if($id > sizeOf($tweets)) {
            return view("tweetError");
        }
        return view("showTweets", ["allTweets" => [$tweets[$id]]]);
    }

    function addTweet(Request $request) {
        DB::insert("INSERT INTO tweet (author, content) VALUES ('$request->author', '$request->content');");
        $tweets = DB::table('tweet')->get();
        return view("showTweets", ["allTweets" => $tweets]);
    }

    function deleteTweet(Request $request) {
        DB::delete("DELETE FROM tweet WHERE id=$request->id");
        $tweets = DB::table('tweet')->get();
        return view("showTweets", ["allTweets" => $tweets]);
    }

}
