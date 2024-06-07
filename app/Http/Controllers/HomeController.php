<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sidebarmenu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use View;

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
    public function home()
    {
        return view('homepage');
    }
    public function index()
    {
        $data = Sidebarmenu::all();
        $userId = Auth::id();
        $userData = User::where('id',$userId)->first(); 
        
        return view('layouts.home-content',compact('data'));
    }
    public function defaultmenu()
    {
        $data = Sidebarmenu::all();
        return view('menus.index',compact('data'));
    }

    public function editRouteName(Request $request)
    {
        $id = $request->id;
        $data = Sidebarmenu::find($id);
        $viewContent = View::make('menus.edit', compact('data'))->render();
        return response()->json(['view' => $viewContent]);
    }

    public function updateRouteName(Request $request)
    {
        $id = $request->id;
        $url = $request->url;
        $sidebarMenu = Sidebarmenu::find($id);

        if ($sidebarMenu) {
            $sidebarMenu->update([
                'url' => $url,
            ]);
            return redirect()->route('defaultmenu')
            ->with('success','Route name updated successfully');
        } else {
            return redirect()->route('defaultmenu')
            ->with('success','Route name failed to update');
        }
    }
}
