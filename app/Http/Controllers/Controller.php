<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function fileUpload(Request $request) {
//        $this->validate($request, [
//            'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/assets/images');
            $image->move($destinationPath, $name);
            return $name;
        }else{
            return 'null';
        }
    }
}
