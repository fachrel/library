<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ClientController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view("client.home", compact('books'));
    }
}
