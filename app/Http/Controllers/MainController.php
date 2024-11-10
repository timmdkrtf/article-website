<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function main(){
        $mains = Main::paginate(5);
        return view('admin.main.index', compact('mains'));
    }

    public function createMainPost(Request $request){
        $request->validate([
            'title' => 'required',
            'logo' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoname = 'logo-main' . uniqid() . '_' . $logo->getClientOriginalName();
            $logo->move(public_path('logo-main'), $logoname);
        }

        $titleStrip = Str::slug($request->title, '-');

        Main::create([
            'title' => $titleStrip,
            'logo' => $logoname,
        ]);
        return redirect()->back()->with('toast_success', 'Add Title Successfull');
    }

    public function destroyMain($id)
    {
        $main = Main::find($id);

        if ($main->logo) {
            $logoPath = public_path('logo-main') . '/' . $main->logo;
            if (File::exists($logoPath)) {
                File::delete($logoPath);
            }
        }

        $main->delete();
        return redirect()->back()->with('toast_success', 'Delete Title Successful');
    }
}
