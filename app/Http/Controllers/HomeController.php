<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\category;

class HomeController extends Controller
{
    public function index()
    {
        //lấy danh mục trong db
        $cate = Category::all();
        //sinh ra vỉew
        return view('home.index', ['cate' => $cate]);
    }

    public function removeCate($cateId)
    {
        $cate = Category::find($cateId);
        // dump($cate);
        if (!$cate) {
            return "Đường dẫn không tồn tại";
        }

        $cate->delete();
        return redirect(route('homepage'));
    }
}
