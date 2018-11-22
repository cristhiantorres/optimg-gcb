<?php

namespace App\Http\Controllers;

use File;
use Excel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ExcelController extends Controller
{
    public function index()
    {
        return view('excel');
    }

    public function store(Request $request)
    {
        $excel = Excel::toArray(new User,$request->file('files'));
        $items = collect();

        foreach ($excel[0] as $key => $value) {
            $item = str_replace(" ", '',$value[0]);
            $items = $items->concat([$item]);
        }

        $files = Storage::files('public/facturas');

        foreach ($items as $key => $value) {
            $ext = pathinfo($files[$key], PATHINFO_EXTENSION);
            Storage::copy($files[$key], "public/nuevas/".$value.'.'.$ext);
        }

        return back();

    }
}
