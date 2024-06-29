<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

class BackgroundController extends Controller
{
    public function index()
    {
        return date('Y-m-d H:i:s');
    }

    public function table($val)
    {
        $data = explode('-', $val);
        $start = isset($data[0]) ? $data[0] : 0;
        $length = isset($data[1]) ? $data[1] : 10;
        $keyword = isset($data[2]) ? $data[2] : '';
        $kategori = isset($data[3]) ? $data[3] : '';
        $sub = isset($data[4]) ? $data[4] : '';
        $year = isset($data[5]) ? $data[5] : '';
        $month = isset($data[6]) ? $data[6] : '';

        Cookie::queue('start', $start, 15);
        Cookie::queue('length', $length, 15);
        Cookie::queue('keyword', $keyword, 15);
        Cookie::queue('kategori', $kategori, 15);
        Cookie::queue('sub', $sub, 15);
        Cookie::queue('year', $year, 15);
        Cookie::queue('month', $month, 15);
    }

    public function upload(Request $request)
    {
        $this->validate(
            $request,
            ['image_file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10240'],
            ['image_file.image' => 'Proses gagal, File IMAGE harus berupa gambar.']
        );

        $image_name = 'img_'.round(microtime(true) * 1000).'.'.$request->file('image_file')->getClientOriginalExtension();
        $image = $request->file('image_file');
        $image->move(public_path('images/upload'), $image_name);

        $response = [
            'success' => true,
            'file' => url('/').'/images/upload/'.$image_name,
            ];

        return response()->json($response);
    }
}
