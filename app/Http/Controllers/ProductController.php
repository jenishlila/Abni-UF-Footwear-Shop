<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Color;
use App\Product;
use App\Multiimage;
use App\Size;
use Dotenv\Regex\Result;
use Session;
use Image;
use File;

class ProductController extends Controller
{
    public function index()
    {
        $colors = Color::where('status', 'Y')->get();
        $categories = Category::where('status', 'Y')->get();
        $size = Size::where('status', 'Y')->get();
    // return $size;        
        return view('layout/admin/product/add', compact('colors', 'categories','size'));
    }
    public function insert(Request $request)
    {
        // return $request;
       $temp= implode(',',$request->size_id);
        // return $temp;
        // dd($request->input('sort'));
        // $this->validate($request, [
        //     'name' => 'required|max:100',
        //     'description' => 'required|max:100',
        //     'upc' => 'required|numeric|unique:products',
        //     'color_id' => 'required',
        //     'brand_id' => 'required',
        //     'stock' => 'required|numeric|max:99999',
        //     'price' => 'required|numeric|between:0,99999.99',
        //     'image' => 'required|mimes:png,jpg,jpeg,gif',
        //     'sort[]' => 'numeric',
        //     'multiimage[]' =>'mimes:png,jpg,jpeg,gif',
        //     'access_url'=> 'required|unique:products',
        //  ]);

        // return $request;
        // $result = Product::create($request->all());
        $result=Product::create(['name'=>$request->name,'description'=>$request->description,'upc'=>$request->upc,
        'color_id'=>$request->color_id,'brand_id'=>$request->brand_id,'stock'=>$request->stock,'price'=>$request->price,
        'access_url'=>$request->access_url,'size_id'=>$temp]);

        return $result;

        if ($request->File('image')) {
            $image = $request->file('image');
            $image_path = resource_path('assets\admin\images\product\\' . $result->upc);
            // dd($image_path);
            if (!file_exists($image_path)) {
                mkdir($image_path);
                $image->move($image_path, 'main.png');
            }
            
            //multiImage
            if ($request->file('multiimage')) {
                // return($request->file('multiimage'));
              
                $image_path = resource_path('assets\admin\images\product\\' . $result->upc);
                foreach ($request->file('multiimage') as $key=> $image) {
                    if ($image->isValid())
                     {
                        Multiimage::create(['product_id' => $result->id, 'name' =>$request->upc.'_'.$key.'.png', 'sort' => $request->input('sort')[$key]]);
                        // dd($request->input('sort'));
                        // return ($image);
                        // $fileName = $request->input('sort')[$key] . '.png';
                        $fileName=$request->upc.'_'.$key.'.png';
                        $image->move($image_path, $fileName);
                       
                    
                    }
                }
            }
        }  
        // dd($result);
        if (isset($result)) {
            session::flash('success', 'Product Added successfuly');
            return redirect('admin/product');
        } else {
            session::flash('error', 'Something Wrong While Adding Product Data...!!');
            return redirect('admin/product');
        }
    }
    public function show()
    {
        $products = Product::select('products.*', 'brand.name as brandname', 'color.name as colorname','size.size as prosize')
            ->join('color', 'color.id', '=', 'products.color_id')
            ->join('brand', 'brand.id', '=', 'products.brand_id')
            ->join('size', 'size.id', '=', 'products.size_id')
            ->where('products.status', "!=", 'T')
            ->get();
            // return $products;
        return view('layout/admin/product/products', compact('products'));
    }
    public function edit(Request $request,$id)
    {
        $products = Product::findOrFail($id);
        $colors = Color::all();
        $categories = Category::all();
        $size = Size::all();
        $images=Multiimage::where('product_id',$request->id)->get();

        return view('layout/admin/product/edit', compact('products', 'colors', 'categories','size','images'));
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'color_id' => 'required',
            'brand_id' => 'required',
            'description' => 'required|max:100',
            'stock' => 'required|numeric|max:99999',
            'price' => 'required|numeric|between:0,99999.99',
            'image' => 'mimes:png,jpg,jpeg,gif', 
            ]);

            $products = Product::whereId($request->id)->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'access_url' => $request->access_url,
            ]);
        
            $image = $request->file('image');
            if (isset($image)) 
            {
                $image_path = resource_path('assets\admin\images\product\\'.$request->upc);
                $image->move($image_path,'main.png');
            }
      
     //multi image Update
        // return $request;
        if ($request->file('multiimage')) 
        {
            $image_path = resource_path('assets\admin\images\product\\' . $request->upc);
             foreach ($request->file('multiimage') as $key=> $image)
             {
                if(isset($request->input('Image_id')[$key]))
                {
                 $mul=Multiimage::where('id',$request->input('Image_id')[$key])->update(['name' => $request->upc.'_'.$key.'.png', 'sort' => $request->input('sort')[$key]]);
                 $fileName=$request->upc.'_'.$key.'.png';
                 $image->move($image_path, $fileName);
                }
                else
                {
                    Multiimage::create(['product_id' => $request->id, 'name' =>$request->upc.'_'.$key.'.png', 'sort' => $request->input('sort')[$key]]);
                     $image_path = resource_path('assets\admin\images\product\\' . $request->upc);
                     $fileName=$request->upc.'_'.$key.'.png';
                     $image->move($image_path, $fileName);
                }
             }
         }
    // //delete image
    $deletes=Multiimage::where('product_id',$request->id)->whereNotIn('id',$request->input('Image_id'))->get();
    // return $delete;
        foreach ($deletes as $delete)
        {
            $image_path = resource_path('assets\admin\images\product\\' . $request->upc.'\\'.$delete->name);
            $delete->delete();
            // Multiimage::where('product_id',$request->id)->whereNotIn('id',$request->input('Image_id'))->delete();
            // return $image_path;
            if(File::exists($image_path)) 
            {
                 File::delete($image_path);
            }
         }
    


        if (isset($products)) {
            session::flash('success', 'Product Updated successfuly...!!');
            return redirect('admin/product');
        } else {
            session::flash('error', 'Something Wrong While Updating Product Data...!!');
            return redirect('admin/product');
        }
    }

    public function Delete($id)
    {
        $result = Product::where('id', $id)->update(['status' => 'T']);
        if (isset($result)) {
            session::flash('success', 'Product Deleted successfuly...!!');
            return redirect('admin/product');
        } else {
            session::flash('error', 'Something Wrong While Deleting Product Data...!!');
            return redirect('admin/product');
        }
    }

    public function trash(Request $request)
    {
        $trash = Product::select('products.*', 'brand.name as brandname', 'color.name as colorname','size.size as sizename')
            ->join('color', 'color.id', '=', 'products.color_id')
            ->join('brand', 'brand.id', '=', 'products.brand_id')
            ->join('size', 'size.id', '=', 'products.size_id')
            ->where('products.status', "=", 'T')
            ->get();
        return view('layout/admin/product/trash', compact('trash'));
    }

    public function AddUniqueProduct(Request $request)
    {
        $products = Product::where('id', '!=', $request->id)->where('upc', $request->upc)->first();
        if (isset($products)) {
            return json_encode(false);
        } else
            return json_encode(true);
    }
    public function ChangeStatus(Request $request)
    {
        $result = Product::where('id', $request->id)->update(['status' => $request->status]);
        if (isset($result)) {
            return json_encode(true);
        } else
            return json_encode(false);
    }
    public function AddUniqueAccessUrl(Request $request)
    {
    //    return response()->json(['msg','fgf']);
        $products = Product::where('id', '!=', $request->id)->where('access_url', $request->access_url)->first();
        if (isset($products)) {
            return json_encode(false);
        } else
            return json_encode(true);
    }

    public function restore($id)
    {
        // return "hii";
        $result = Product::where('id', $id)->update(['status' => 'Y']);
        if (isset($result)) {
            session::flash('success', 'Product Restored successfuly...!!');
            return redirect('admin/product');
        } else {
            session::flash('error', 'Something Wrong While Restoring Product Data...!!');
            return redirect('admin/product');
        }
    }

    public function destroy($id)
    {
        $result = Product::where('id', $id)->delete();
        if (isset($result)) {
            session::flash('success', 'product Deleted successfuly...!!');
            return redirect('admin/product/trash');
        }
    }
    public function DeleteMultiImage(Request $request)
    {
        Multiimage::where('id',$request->id)->delete();
        return response()->json([
            'success'=>'Image Deleted Succesfully'
        ]);
    }
}
