<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

// hoc dc route / dg dan xu li du lieu qua form post
class ProductController extends Controller
{
    //
    public function getList()
    {
        $products = Product::simplePaginate(15);

        // $listCate = Category::all();
        // dump($products);
        //  xem gia tri minh la ra la gi : 1 : mang? truyen sang view thi foreach / arr
        // 2 la doi tuong : goi den ten(cut.) va thuoc tinh(quan, ao ,dep , toc))  cua n //
        // cut->ao , cut->quan
        // $listProd = Product::get();
        // dump($listProd);
       return view('admin.product.list',[
        'products'=>$products
       ]);
    }

    public function getCreate()
    {
        $listCate = Category::all();
        // dump($listCate);
       return view('admin.product.add',[
           'listCate'=>$listCate
       ]);
    }

    public function postCreate(Request $req)
    {
        try {
            // dump($req->all());
            $name = $req->name;
            $price = $req->price;
            $status = $req->status;
            $quantity = $req->quantity;
            $detail = $req->detail;
            $image = $req->image; // buoc 1 lay ra input file image
            $nameImg = $image->getClientOriginalName(); // b2 lay ra ten anh
            $link =  $image->move('upload/product', $nameImg); // b3 di chuyen vao thu muc Public/upload/product
            $cate_id = $req->cate_id;
            // ham tao moi
            $create = Product::create([
                'name' => $name,
                'price' => $price,
                'status' => $status,
                'quantity' => $quantity,
                'detail' => $detail,
                'image' => $nameImg,
                'cate_id' => $cate_id,
            ]);
            if($create){
                return redirect()->route('product.getList');
            }
        } catch (\Exception $th) {
            dump($th->getMessage());
        }
    }


    public function getEdit(Request $req)
    {
        $id = $req->id;

        $listCate = Category::all();

        $detailProduct = Product::where('id',$id)->first();

        // dump($detailProduct);
        // dump($listCate);
        return view('admin.product.edit',[
            'listCate'=>$listCate,
            'prod' => $detailProduct,
        ]);
    }

    public function postEdit(Request $req)
    {
        try {

            $id = $req->id;
            $detailProduct = Product::where('id',$id)->first();

            $name = $req->name;
            $price = $req->price;
            $status = $req->status;
            $quantity = $req->quantity;
            $detail = $req->detail;
            $cate_id = $req->cate_id;


            if($req->image == ""){
                $nameImg = $detailProduct->image;
            }else{
                $image = $req->image; // buoc 1 lay ra input file image
                $nameImg = $image->getClientOriginalName(); // b2 lay ra ten anh
                $link =  $image->move('upload/product', $nameImg); // b3 di chuyen vao thu muc Public/upload/product
            }

            // hoc duoc ham sua / sua theo id
            $update = Product::where('id',$id)->update([
                'name' => $name,
                'price' => $price,
                'status' => $status,
                'quantity' => $quantity,
                'detail' => $detail,
                'image' => $nameImg,
                'cate_id' => $cate_id,
            ]);

            if($update){
                return redirect()->route('product.getList');
            }


        } catch (\Exception $th) {
            dump($th->getMessage());
        }
    }

    public function postDelete(Request $req)
    {
        try {
        $id = $req->id;
        //  $req de lam gi
        // hoc dc xoa / xoa theo id
            $delete = Product::where('id',$id)->delete();
            if($delete){
                return redirect()->route('product.getList');
            }
        } catch (\Exception $th) {
            dump($th->getMessage());
        }
    }

}
