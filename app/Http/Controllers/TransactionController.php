<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use App\Models\LoanDetail;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function borrow(){
        $books = Book::all();
        $users = User::where('level', "0")->get();
        return view('server.borrow', compact('books', 'users'));
    }

    public function selectUser(Request $request)
    {
        $user = User::findOrFail($request->user);
        session()->put('selectedUser', [
            'id' => $user->id,
            'username' => $user->username,
        ]);

        flash()->success('Peminjam dipilih.');

        return redirect()->back();
    }

    public function addBooktoCart($id)
    {
        $book = Book::findOrFail($id);
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            flash()->error('Buku sudah ditambahkan.');
        } else {
            $cart[$id] = [
                "id" => $book->id,
                "name" => $book->name,
                "author" => $book->author,
            ];
            flash()->success('Buku ditambah.');
        }
        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function deleteBookFromCart($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            flash()->success('Buku dihapus.');
            return redirect()->back();
        }
    }

    public function deleteAllBookFromCart()
    {
        session()->forget('cart');

        flash()->success('Semua buku dihapus.');
        return redirect()->back();
    }

    public function borrowBooks(){
        $cart = session()->get('cart');
        $user = session()->get('selectedUser');
        if (!$user || empty($user)) {
            flash()->error('Pilih peminjam terlebih dahulu.');
            return redirect()->back();
        }

        if (!$cart || empty($cart)) {
            flash()->error('Pilih buku terlebih dahulu.');
            return redirect()->back();
        }

        $loan = Loan::create([
            'invoice'       => 'INV-' . now()->format('Ymd') . '-' . $user['id'] . '-' . str_pad(count($cart), 3, '0', STR_PAD_LEFT),
            'user_id' => $user['id'],
            'borrowed_at'   => now(),
            'must_returned_at'   => now()->addDays(7),
        ]);

        $loan_id = $loan->id;

        foreach ($cart as $item) {
            LoanDetail::create([
                'invoice'       => 'INV-D' . now()->format('Ymd') . '-' . $user['id'] . '-' . str_pad($item['id'], 3, '0', STR_PAD_LEFT),
                'loan_id'       => $loan_id,
                'user_id'       => $user['id'],
                'book_id'       => $item['id'],
                'borrowed_at'   => now(),
                'returned_at'   => null,
                'status'        => 'borrowed',
            ]);
        }

        session()->forget('cart');
        session()->forget('selectedUser');
        flash()->success('Peminjaman berhasil.');
        return redirect()->back();

    }

    public function return(){
        $loans = Loan::get();
        return view('server.return', compact('loans'));
    }


    public function detail($id){
        $loan = Loan::findOrFail($id);
        return view('server.return-detail', compact('loan'));
    }
}
