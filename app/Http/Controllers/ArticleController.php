<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function index()
    {
        $filePath = resource_path('articles.json');

        if (!File::exists($filePath)) {
            File::put($filePath, json_encode([], JSON_PRETTY_PRINT));
        }

        $articles = json_decode(File::get($filePath), true);
        $categories = collect($articles)->groupBy('category_content')->keys();

        return view('articles.categories', compact('categories'));
    }

    public function byCategory($category)
    {
        $filePath = resource_path('articles.json');
        $articles = File::exists($filePath) ? json_decode(File::get($filePath), true) : [];
        $filteredArticles = collect($articles)->filter(fn($article) => strtolower($article['category_content']) === strtolower($category));

        return view('articles.index', ['articles' => $filteredArticles, 'category' => $category]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $filePath = resource_path('articles.json');

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'category_content' => 'required|string|max:100',
            'content' => 'required|min:10',
        ]);

        $articles = File::exists($filePath) ? json_decode(File::get($filePath), true) : [];

        $articles[] = [
            'id' => uniqid(),
            'title' => $validatedData['title'],
            'category_content' => $validatedData['category_content'],
            'content' => $validatedData['content'],
            'author' => session()->get('user_id', 'guest'),
            'created_at' => now()->toDateTimeString(),
        ];

        File::put($filePath, json_encode($articles, JSON_PRETTY_PRINT));

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($id)
    {
        return view('articles.edit', ['articleId' => $id]);
    }

    public function delete($id)
    {
        $filePath = resource_path('articles.json');
        $articles = File::exists($filePath) ? json_decode(File::get($filePath), true) : [];
        $articles = array_filter($articles, fn($article) => $article['id'] != $id);

        File::put($filePath, json_encode($articles, JSON_PRETTY_PRINT));

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
