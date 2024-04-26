<?php

namespace App\Http\Controllers;

use App\Events\ArticleParsed;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\Editor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\InlinesOnly\InlinesOnlyExtension;
use League\CommonMark\Extension\SmartPunct\SmartPunctExtension;
use League\CommonMark\Extension\Strikethrough\StrikethroughExtension;
use League\CommonMark\Event\DocumentParsedEvent;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showUserArticles(string $id) 
    {
        // to be indexed
        $userArticles = Article::with('category')
            ->where('user_id', $id)
            ->get();

        return Inertia::render('Articles/ShowArticles', [
            'articles' => $userArticles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(String $id)
    {
        return Inertia::render('CreateArticle', [
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
