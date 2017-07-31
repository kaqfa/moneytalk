<?php

namespace MoneyTalk\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MoneyTalk\Repositories\TransactionRepository;

class TransactionController extends Controller
{
    protected $repo;


    public function __construct(TransactionRepository $transRepo)
    {
        $this->repo = $transRepo;
        $this->repo->setUid(Auth::id());
    }

    public function add(Request $request)
    {
        if ($request->isMethod('post')) {
            Auth::user()->addTransaction($request->all());

            return redirect()->route('home')
                ->with('message', 'Berhasil input data transaksi baru');
        }
        return view('transaction.add');
    }

    public function show()
    {
        return view('transaction.list', ['balance' => $this->repo->getBalance(),
                        'outTransactions' => $this->repo->listOut(),
                        'inTransactions' => $this->repo->listIn()]);
    }
}
