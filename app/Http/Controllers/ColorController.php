<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Color;
use App\Product;
use Session;
use Illuminate\Cache\RetrievesMultipleKeys;
use PhpParser\Node\Stmt\Return_;

class ColorController extends Controller
{
    public function insert(Request $request)
    {
        $validateData=$request->validate([
            'name'=> 'required | unique:color',
        ]);
        
       $result= Color::create(['name'=>$request->name]);
            if(isset($result))
            {
                session::flash('success','Color Added successfuly');
                return redirect('admin/color');
            }
            else
            {
                session::flash('error','Something Wrong While Adding Color Data...!!');
                return redirect('admin/color');
            }
    }

    public function show()
    {
         $color=Color::where('status',"!=",'T')->get();  
       // $color=Color::all();
            return view('layout/admin/color/colors',compact('color'));
    }
    public function update(Request $request)
    {
        // return "hii";
        $validateData=$request->validate([
            'name'=> 'required | unique:color',
        ]);
        // return ($id);
        $result=Color::whereId($request->id)->update(['name'=>$request->name]);
        if(isset($result))
        {
            session::flash('success','Color Edited successfuly...!!');
            return redirect('admin/color'); 
            
        }
        else
        {
            session::flash('error','Something Wrong While Editing Color Data...!!');
            return redirect('admin/color');
        }
        
    }    

    public function Edit(Request $request,$id)
    {
        // return $request;
        // $validateData=$request->validate([
        //     'name'=> 'required | unique:color',
        // ]);
      
        $color=Color::whereId($id)->first();
        // return $color;
        return view('layout/admin/color/edit',compact('color'));
    }

    public function Delete($id)
    {
        $products=Product::where('color_id',$id)->first();
        $colors=Color::where('id',$id)->where(['status'=>'Y'])->first();
        
        if(isset($colors)&&($products))
        {
            session::flash('warning','This Color Is Already Use Cant  Deleted...!!');
            return redirect('admin/color');
        }
        
        $result=Color::where('id',$id)->update(['status'=>'T']);
        if(isset($result))
        {
            session::flash('success','Color Deleted successfuly...!!');
            return redirect('admin/color');
        }
        else
        {
            session::flash('error','Something Wrong While Deleting Color Data...!!');
            return redirect('admin/color');
        }
    }


    public function AddUniqueColor(Request $request)
    {
     // return response()->json(['dsfdsf'=>$request->name]);
     $color=Color::where('id','!=', $request->id )->where('name',$request->name)->first();
        // $color=Color::where('name',$request->name)->first();
       if(isset($color)){
        
           return json_encode(false);
       }
       else
            Return json_encode(true);
    }
    public function ChangeStatus(Request $request)
    {
       $result= Color::where('id',$request->id)->update(['status'=>$request->status]);
       if(isset($result)){
            return json_encode(true);
        }
        else
             Return json_encode(false);
    }
    public function trash(Request $request)
    {
        $trash=Color::where('status',"=",'T')->get();  
        // $color=Color::all();
             return view('layout/admin/color/trash',compact('trash'));
    }

    public function restore($id)
    {
        $result=Color::where('id',$id)->update(['status'=>'Y']);
        if(isset($result))
        {
            session::flash('success','Color Restored successfuly...!!');

             return redirect('admin/color');
        }
        else
        {
            session::flash('error','Something Wrong While Restoring Color Data...!!');
            return redirect('admin/color');
        }
    }
    public function destroy($id)
    {
        $result=Color::where('id',$id)->delete();
        if(isset($result))
        {
            session::flash('error','Color Deleted successfuly...!!');
            return redirect('admin/color/trash');
        }
    }
}
