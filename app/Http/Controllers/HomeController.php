<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Folder $folder)
    {
      $user = Auth::user();
      $folder = $user->folders()->first();
      if (is_null($folder))
        {
            return view('home');
        }

        return redirect()->route('tasks.index', [
            'folder' => $folder->id,
        ]);
    }
}
