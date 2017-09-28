<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $tody = date('Ymd', time());
        $content = \Cache::get($tody);
        if (!$content) {
            $client = new Client();
            $response = $client->request('GET', 'https://interface.meiriyiwen.com/article/today?dev=1' );
            $content = $response->getBody();
        }
        header('Content-Type: application/json');
        $content = preg_replace('#<[^>]+>#', '\n', $content);
        echo $content;
        exit;
        ///$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
