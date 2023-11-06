<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function createcategory(){
        return view('createcategory');
    }
    public function manage_category(Request $request,$id=''){
        if ($request->isMethod('post')) {
            if ($request->input('id') == '') {
                $category = new Category;
                info($category);
            } else {
                $category = Category::find($request->input('id'));
            }
            // info($category);
           
            $category->name = $request->input('category_name');
            
            $category->save();
            
            if ($request->input('id')) {
                return redirect('/category_list')->with('success', 'Update successfully!');
            } else {
                
                return redirect('/category_list')->with('success', 'Add successfully!');
            }
        }
    
        if ($id) {
            $category = category::find($id);
        } else {
            $category = null;
        }
    
       
        $page_data['category'] = $category;
        $page_data['menu'] = 'category';
        return view('createcategory', $page_data);
    }
    public function categorylist(){
        info("hh");
        return view('category_list');
    }
    public function getCategories(Request $request)
{
    if ($request->ajax()) {
        $data = Category::latest()->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
   
                $details = '<a href="'.url('/manage_category').'/'.$row->id.'"class="edit btn btn-primary btn-sm">Edit</a>';
                   $details.= '<a href="'.url('/del_category').'/'.$row->id.'" class="edit btn btn-danger btn-sm">Delete</a>';

                    return $details;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
public function del_category(Request $request,$id=''){
    $data = Category::find($id);
    if($data){
        $data->delete();
        return Redirect::back()->with('success','deleted successfully');
    }else{
        return Redirect::back()->with('Error','Data not found');
    }
}
}
