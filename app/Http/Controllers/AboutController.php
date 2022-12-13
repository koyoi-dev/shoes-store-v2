<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    protected static $teams = [
        [
            'name' => 'Made Agustha I.S.',
            'image' => 'made.jpg'
        ],
        [
            'name' => 'Muhammad Fathariq Dimas Octaviandra',
            'image' => 'fadim.png'
        ],
        [
            'name' => 'Velencia',
            'image' => 'velencia.png'
        ]
    ];
    public function index() {
        return view('about', [
            'teams' => self::$teams
        ]);
    }
}
