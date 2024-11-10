<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
// if($request->hasFile('logo')){
//     $logo = $request->file('logo');
//     $logoname = "Logo-Main_". uniqid().".". $logo->getClientOriginalExtension();
//     $logo->storeAs('public/logos/', $logoname);
//     $produks['logo'] = $logoname;
// }
