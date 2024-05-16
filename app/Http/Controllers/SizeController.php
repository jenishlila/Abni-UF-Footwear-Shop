<?php

namespace App\Http\Controllers;
use App\Size;
use Session;

use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function insert(Request $request)
    {
        # code...
        // return $request;
        $validateData=$request->validate([
            'size'=> 'required',
        ]);
        
       $result= Size::create(['size'=>$request->size]);
            if(isset($result))
            {
                session::flash('success','Size Added successfuly');
                return redirect('admin/size');
            }
            else
            {
                session::flash('error','Something Wrong While Adding Size Data...!!');
                return redirect('admin/size');
            }
    }
    public function AddUniqueSize(Request $request)
    {
        // return $request;
     $size=Size::where('id','!=', $request->id )->where('size',$request->size)->first();
       if(isset($size))
       {
            return json_encode(false);
       }
       else
            Return json_encode(true);
    }
    public function show(Request $request)
    {
        # code...
        // return "hiii";
        $size=Size::where('status',"!=",'T')->get();  
        // $color=Color::all();
             return view('layout/admin/size/size',compact('size'));
    }
    public function Edit(Request $request,$id)
    {
        // return 'hiiii';
        // $validateData=$request->validate([
        //     'size'=> 'required | unique:size',
        // ]);
      
        $size=Size::whereId($id)->first();
        // return $color;
        return view('layout/admin/size/edit',compact('size'));
    }
    public function update(Request $request)
    {
        // return $request;
        $validateData=$request->validate([
            'size'=> 'required | unique:size',
        ]);
        // return ($id);
        $result=Size::whereId($request->id)->update(['size'=>$request->size]);
        
        if(isset($result))
        {
            session::flash('success','Size Edited successfuly...!!');
            return redirect('admin/size'); 
            
        }
        else
        {
            session::flash('error','Something Wrong While Editing Size Data...!!');
            return redirect('admin/size');
        }
        
    }
    public function ChangeStatus(Request $request)
    {
        // return $request;
       $result= Size::where('id',$request->id)->update(['status'=>$request->status]);
       if(isset($result)){
            return json_encode(true);
        }
        else
             Return json_encode(false);
    }
    public function Delete($id)
    {
    //    return $id;
        // $products=Product::where('color_id',$id)->first();
        // $colors=Color::where('id',$id)->where(['status'=>'Y'])->first();
        
        // if(isset($colors)&&($products))
        // {
        //     session::flash('warning','This Color Is Already Use Cant  Deleted...!!');
        //     return redirect('admin/color');
        // }
        
        $result=Size::where('id',$id)->update(['status'=>'T']);
        if(isset($result))
        {
            session::flash('success','Size Deleted successfuly...!!');
            return redirect('admin/size');
        }
        else
        {
            session::flash('error','Something Wrong While Deleting Size Data...!!');
            return redirect('admin/size');
        }
    }
    public function trash(Request $request)
    {
        $trash=Size::where('status',"=",'T')->get();  
        // $color=Color::all();
             return view('layout/admin/size/trash',compact('trash'));
    }
    public function restore($id)
    {
        $result=Size::where('id',$id)->update(['status'=>'Y']);
        if(isset($result))
        {
            session::flash('success','Size Restored successfuly...!!');

             return redirect('admin/size');
        }
        else
        {
            session::flash('error','Something Wrong While Restoring Size Data...!!');
            return redirect('admin/size');
        }
    }
    public function destroy($id)
    {
        $result=Size::where('id',$id)->delete();
        if(isset($result))
        {
            session::flash('error','Size Deleted successfuly...!!');
            return redirect('admin/size/trash');
        }
    }
}
