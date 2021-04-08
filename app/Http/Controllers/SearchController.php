<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function articles(Request $request): Factory | View | Application
    {
        $query = $request->input('search');

        $url = '/api/search/articles/search='.$query;

        return view('pages.search.result', [
            'type'  => 'articles',
            'query' => $query,
            'url'   => $url,
        ]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function authors(Request $request): Factory | View | Application
    {
        $query = $request->input('search');

        $url = '/api/search/authors/search='.$query;

        return view('pages.search.result', [
            'type'  => 'authors',
            'query' => $query,
            'url'   => $url,
        ]);
    }
}
