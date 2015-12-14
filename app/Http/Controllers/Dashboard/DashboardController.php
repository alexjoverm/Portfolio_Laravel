<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Project;
use JWTAuth;
use Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projects = Project::all()->sortByDesc('created_at');
        $categories = Category::all()->sortBy('name');
        //$user = JWTAuth::toUser(JWTAuth::getToken());
        $user = Auth::User();

        //dd($request->all());
        dd($user);
    }

}
