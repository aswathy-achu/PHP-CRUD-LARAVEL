<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
   
    public function createproduct(){
        $categories = Category::all(); 
        return view("createproduct", compact('categories'));
    }
    public function manage_product(Request $request,$id=''){
        if ($request->isMethod('post')) {
            if ($request->input('id') == '') {
                $product = new Product;
                info($product);
            } else {
                $product = Product::find($request->input('id'));
            }
            // info($product);
           
            $product->name = $request->input('product_name');
            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');
            $product->description = $request->input('desc');
            $product->category = $request->input('category');
            
            $product->save();
            
            if ($request->input('id')) {
                return redirect('/product_list')->with('success', 'Update successfully!');
            } else {
                
                return redirect('/product_list')->with('success', 'Add successfully!');
            }
        }
    
        if ($id) {
            $product = product::find($id);
        } else {
            $product = null;
        }
    
        $categories = Category::all();
        $page_data['product'] = $product;
        $page_data['categories'] = $categories;
        $page_data['menu'] = 'product';
        return view('createproduct', $page_data);
    }

    public function product_list() {
        
        return view('product_list');
    }
    
    public function get_product(Request $request)
{
    if ($request->ajax()) {
        $data = Product::join('category_details', 'product_details.category', '=', 'category_details.id')
            ->select('product_details.*', 'category_details.name as category')
            ->latest()
            ->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('category', function($row){
                return $row->category; 
            })
            ->addColumn('action', function($row){
                $details = '<a href="'.url('/manage_product').'/'.$row->id.'" class="edit btn btn-primary btn-sm">Edit</a>';
                $details.= '<a href="'.url('/del_product').'/'.$row->id.'" class="edit btn btn-danger btn-sm">Delete</a>';
                return $details;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}

    public function del_product(Request $request,$id=''){
        $data = Product::find($id);
        if($data){
            $data->delete();
            return Redirect::back()->with('success','deleted successfully');
        }else{
            return Redirect::back()->with('Error','Data not found');
        }
    }

}    
