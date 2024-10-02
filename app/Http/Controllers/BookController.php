<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

// php artisan make:controller BookController

class BookController extends BaseController
{
    public $books = [
        ['id' => 1, 'title' => 'Book 1', 'author' => 'Author 1'],
        ['id' => 2, 'title' => 'Book 2', 'author' => 'Author 2'],
        ['id' => 3, 'title' => 'Book 3', 'author' => 'Author 3'],
    ];

    function showBooks(Request $request)
    {
        if ($request->has('title')) {
            $title = $request->input('title');

            if ($title) {
                $book = $this->findBookByTitle($this->books, $title);

                return $book;
            } else {
                return null;
            }
        } else {
            $books = $this->books;

            // return view('books.index', ['books' => $books]);

            return response()->json(['books' => $books]);
        }
    }

    function showBook($id)
    {
        if ($id <= 0 || $id > count($this->books)) {
            return null;
        } else {
            $book = $this->books[$id - 1];

            return view('books.show', ['book' => $book]);
        }
    }

    public function findBookByTitle($books, $title)
    {
        foreach ($books as $book) {
            if ($book['title'] === $title) {
                return $book;
            }
        }
        return null;
    }
}
