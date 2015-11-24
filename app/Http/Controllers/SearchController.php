<?php

namespace Pibbble\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    /*
     * Runs searches against projects and users
     */

    public function search()
    {
        $searchInput = Input::get('searchinput');

        if ($searchInput) {
            $projects = DB::table('projects')->join('users', 'users.id', '=', 'projects.user_id');

            $results = $projects->where('projectname', 'ILIKE', '%'.$searchInput.'%')
                                 ->orWhere('description', 'ILIKE', '%'.$searchInput.'%')
                                 ->orWhere('technologies', 'ILIKE', '%'.$searchInput.'%')
                                 ->orWhere('users.username', 'ILIKE', '%'.$searchInput.'%')
                                 ->get();
        } else {
            $results = [];
        }

        return view('search')->with('projects', $results);
    }
}