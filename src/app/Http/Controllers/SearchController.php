<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');

        $url = 'api/search?search=' . $query;

        return view('pages.search-result', compact('url'), compact('query'));
    }
}
