<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\Pinjaman;
use App\Models\Denda;
use App\Models\User;

class PerpustakaanController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('perpustakaan.index', compact('books'));
    }
}
