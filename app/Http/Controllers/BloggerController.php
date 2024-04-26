<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Article;


class BloggerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $users = DB::table('users')->where('id', '<>', Auth::id())->distinct()->get();

        return Inertia::render('Home', [
            'user', Auth::user(),
            'users' => $users,
            'canRegister' => Route::has('register'),
            'canLogin' => Route::has('login'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $blogger = User::find($id);
        

        $articles = Article::with('tags')->where('user_id', $id)->get();

        return Inertia::render('UserSpace', [
            'blogger' => $blogger,
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
