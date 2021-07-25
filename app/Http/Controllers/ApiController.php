<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use validator;

class ApiController extends Controller
{
    function getData()
    {
        /*send data in array format and laravel automaticaaly convert into json format*/
        return ['name'=>'amar', 'email'=>'abc@gmail.com'];
    }

    function getProducts($id=null)  
    {
        /*send data in array format and laravel automaticaaly convert into json format*/
        
        /*$data = Product::all();
        return ['getproducts' => $data];*/

        //return Product::all(); //without parameter   getproducts()

       // return Product::find($id); with parameter    getproducts($id)

     return $id ? Product::find($id) : Product::all(); //ternary opertaor to check whether parmeter or w/o
    }

    function insertProduct(Request $req)
    {
        $rules = $req->validate([ 
              'product_name'=>'required',
        ]);
        $data = new Product;
        $data->product_name = $req->product_name;
        $data->product_desc = $req->product_desc;
        $result = $data->save();
        if($result)
        {
            return ['result'=>'Data submiited'];
        }
        else
        {
            return ['result'=>'Operation failed'];
        }
    }

    function updateProduct(Request $req)
    {
        $data = Product::find($req->id);
        $data->product_name = $req->product_name;
        $data->product_desc = $req->product_desc;
        $result = $data->save();
        if($result)
        {
            return ['result'=>'Data Updated'];
        }
        else
        {
            return ['result'=>'Operation failed'];
        }
    }

    function deleteProduct($id)
    {
        $data = Product::find($id);        
        $result = $data->delete();
        if($result)
        {
            return ['result'=>'Data Deleted'];
        }
        else
        {
            return ['result'=>'Operation failed'];
        }
    }

    function searchProducts($data)
    {
         //return Product::where('product_name', $data)->get(); // in one line

         $result = Product::where('product_name', 'like','%' . $data . '%'); 
         if($result)
         {
            return $result->get();    
         }
          else
          {
            return ['result'=>'No Data Match'];
          }          
    }
}
