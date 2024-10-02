<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

// php artisan make:controller ArticleControlle

class ArticleController extends Controller
{
    public function fetchArticles()
    {
        $articles = Article::all();

        return response()->json(['articles' => $articles]);
    }

    public function createArticle(Request $request)
    {
        // return $request->user();

        $requestedTitle = $request->input('title');
        $requestedBody = $request->input('body');

        $article = Article::create([
            'title' => $requestedTitle,
            'body' => $requestedBody
        ]);

        return response()->json(['article' => $article]);
    }

    public function showArticle($id)
    {
        $article = Article::find($id);

        if ($article) {
            return response()->json(['article' => $article]);
        } else {
            return response()->json(['message' => 'Article not found'], 404);
        }
    }

    public function deleteArticle($id)
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();
            return response()->json(['message' => 'Article deleted']);
        } else {
            return response()->json(['message' => 'Article not found'], 404);
        }
    }

    public function updateArticle(Request $request, $id)
    {
        $article = Article::find($id);

        $requestedTitle = $request->input('title');
        $requestedBody = $request->input('body');

        if ($article) {
            $article->title = $requestedTitle;
            $article->body = $requestedBody;
            $article->save();
            return response()->json(['article' => $article]);
        } else {
            return response()->json(['message' => 'Article not found'], 404);
        }
    }
}
