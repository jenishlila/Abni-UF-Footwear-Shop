<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Session;

class CategoryController extends Controller
{
    public function insert(Request $request)
    {
        $validateData=$request->validate([
            'name'=> 'required | unique:brand',
        ]);
        
       $result= Category::create(['name'=>$request->name]);
            // return $result;
            if(isset($result))
            {
                session::flash('success','Category Added successfuly');
                return redirect('admin/category');
            }
            else
            {
                session::flash('error','Something Wrong While Storing Category Data...!!');
                return redirect()->back();
            }
        }
        public function show()
        {
             $category=Category::where('status',"!=",'T')->get();  
        //    $category=Category::all();
                return view('layout/admin/category/categories',compact('category'));
        }
        public function update(Request $request)
        {
            $validateData=$request->validate([
                'name'=> 'required | unique:brand',
            ]);
            
            // return ($id);
            $result=Category::whereId($request->id)->update(['name'=>$request->name]);
            if(isset($result))
            {
                session::flash('success','Category Edited successfuly...!!');
                return redirect('admin/category'); 
            }
            else
            {
                session::flash('error','Something Wrong While Editing Category Data...!!');
                return redirect()->back();
            }
            
        }    
        public function Edit(Request $request,$id)
        {
            $validateData=$request->validate([
                'name'=> 'required | unique:brand',
            ]);
            
            $category=Category::whereId($id)->first();
            return view('layout/admin/category/edit',compact('category'));
        }
        public function Delete($id)
        {
            
         $products=Product::where('brand_id',$id)->first();
         $categories=Category::where('id',$id)->where(['status'=>'Y'])->first();
        
        if(isset($categories)&&($products))
        {
            session::flash('warning','This Category Is Already Use Cant Deleted...!!');
            return redirect('admin/category');
        }
        $result=Category::where('id',$id)->update(['status'=>'T']);
            if(isset($result))
            {
                session::flash('success','Category Deleted successfuly...!!');
                return redirect('admin/category');
            }
            else
            {
                session::flash('error','Something Wrong While Deleting Category Data...!!');
                return redirect()->back();
            }
        }
        public function trash(Request $request)
        {
            $trash=Category::where('status',"=",'T')->get();  
            // $color=Category::all();
                 return view('layout/admin/category/trash',compact('trash'));
        }
        public function restore($id)
         {
            $result=Category::where('id',$id)->update(['status'=>'Y']);
            if(isset($result))
            {
                session::flash('success','Category Restored successfuly...!!');
    
                return redirect('admin/category');
            }
            else
            {
                session::flash('error','Something Wrong While Restoring Category Data...!!');
                return redirect()->back();
            }
           
        }
        public function destroy($id)
        { 
             $result=Category::where('id',$id)->delete();
                if(isset($result))
                {
                    session::flash('error','Category Deleted successfuly...!!');
                    return back();
                }
        }
        public function AddUniqueCategory(Request $request)
        {
            $category=Category::where('id','!=',$request->id)->where('name',$request->name)->first();
           if(isset($category)){
               return json_encode(false);
           }
           else
                Return json_encode(true);
        }
        
    public function ChangeStatus(Request $request)
    {
        // return response()->json(['dsfdsf'=>'fddfdf']);
        $result= Category::where('id',$request->id)->update(['status'=>$request->status]);
        if(isset($result)){
             return json_encode(true);
         }
         else
              Return json_encode(false);
    }
   
}