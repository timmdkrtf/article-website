<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Main;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function landing(Request $request){

        $term = $request->input('search');
        if($term){
            $articles = Article::where("title", "LIKE", "%$term%")
                ->orWhereHas("category", function ($query) use ($term){
                    $query->where('category', 'LIKE', "%$term%");
                })
            ->get();
        }else{
            $articles = Article::all();
        }
            $mains = Main::all();
            $articlesDropdown = [];
            foreach ($mains as $main) {
                // Mengambil artikel yang memiliki main_id yang sama dengan id Main saat ini
                $articlesFiltered = $articles->where('main_id', $main->id);
                // Menambahkan artikel ke dalam array $articlesDropdown
                $articlesDropdown[$main->title] = $articlesFiltered;
            }
        return view('admin.landing', compact('articlesDropdown', 'mains'));
    }

    public function showLanding($id)
    {
        $article = Article::find($id);
        return view('admin.show-landing',compact('article'));
    }

    public function login(){
        return view('admin.login');
    }

    public function loginAuth(Request $request){
        $request->validate([
            'email' => 'required',
            'password'=> 'required',
        ]);
        $userLogin = $request->only('email','password');

        if(Auth::attempt($userLogin)) {
            $auth = Auth::user();
            if($auth){
                return redirect('/dashboard')->with('toast_success', 'Login Successfully');
            }else{
                return redirect('/login')->with('toast_error', 'Login Gagal');
            };
        }else{
            return redirect('/login')->with('toast_error', 'Login error, check your email and password!!');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/landing')->with('toast_success', 'Logout Successfully');
    }
}

