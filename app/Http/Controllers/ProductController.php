<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\User;
use App\Models\product;
use DB;
use Auth;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * @OA\Post(
     *      path="/api/product/SingleProduct/{id}",
     *      operationId="Singleproduct",
     *      tags={"Products"},
     *      summary="Show Single product",
     *      description="Show single product",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Enter product id .",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad user Input",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     *     )
     */
	//show a product by it's specific id
     function index(Request $request,$id){
            $id=$request->id;
            $product=product::all()->where('id',$id);
            $count=collect($product)->count();
             if ( $count == 1) {
                return response()->json([
                    'message' => 'Single product details',
                    'product' => $product,
                 ]); 
            }elseif($count == 0){
                return response()->json([
                    'message' => 'Invalid product id',
                ]);  
            }
        
    }

        /**
     * @OA\Get(
     * path="/api/product/show",
     * summary="show product",
     * description="Show all products !",
     * operationId="ProductShow",
     * security={{"bearer_token":{}}},
     * tags={"Products"}, 
     *
     *      @OA\Response(
     *          response=200,
     *          description="Successfull logged in."
     *     ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad user Input",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

    //show a all products in store
     function show(){
            $product=product::all();
            
            if (collect($product)->count() > 0) {
                return response()->json([
                    'message' => 'All products in store',
                    'product' => $product,
                 ]); 
            }elseif(collect($product)->count() == 0){
                return response()->json([
                    'message' => 'No data found !',
                    
                    
                ]);  
            }

             return response()->json([
                'message' => 'Unauthorized',
            ]);  
        
    }

    /**
     * @OA\Post(
     * path="/api/product/store",
     * summary="store product",
     * description="Store by name,images,description,price and store",
     * operationId="ProductStore",
     * security={{"bearer_token":{}}},
     * tags={"Products"}, 
     *
     *      @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"name","images","description","store","price"},
     *               @OA\Property(property="name", type="text",description="Enter name of product"),
     *               @OA\Property(property="images", type="file",description=" Enter image of product"),
     *               @OA\Property(property="description", type="text",description="Enter product details"),
     *               @OA\Property(property="store", type="text",description="Store product numbers"),
     *               @OA\Property(property="price", type="text",description="Enter product price"),
     *               
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=200,
     *          description="Successfull logged in."
     *     ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad user Input",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */

	//create or store the product
     function store(Request $request){

             $request->validate([
                'name' => 'required',
                'images' => 'required|mimes:jpg,jpeg,png',
                'description' => 'required|max:200',
                'price' => 'required',
                'store' => 'required',
             ]);

            $product=new product;
            $product->name = $request->name;

            if($request->hasFile('images')){
                $file= $request->file('images');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('images/product'), $filename);
                $product['image']= $filename;
            }
                
            $product->description = $request->description;
            $product->price = $request->price;
            $product->store = $request->store;
            $product->save();
            
            if ($product) {
                return response()->json([
                    'message' => 'Product created',
                    'product' => $product,
                 ]); 
            }else{
                return response()->json([
                    'message' => 'Error to created product',
                    'product' => $product,
                    
                ]);  
            }
        
    }

     /**
     * @OA\Post(
     *      path="/api/product/update/{id}",
     *      operationId="productUpdate",
     *      tags={"Products"},
     *      summary="Update product",
     *      description="Modify the product",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id .",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *       ),
     *      @OA\Parameter(
     *          name="name",
     *          description="Modify name of product.",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *      @OA\Parameter(
     *          name="images",
     *          description="Modify image of product",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="file"
     *          )
     *       ),
     *      @OA\Parameter(
     *          name="description",
     *          description="Modify description of product.",
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *      @OA\Parameter(
     *          name="store",
     *          description="Modify product store ",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *       ),
     *      @OA\Parameter(
     *          name="price",
     *          description="Modify product price",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad user Input",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     *     )
     */

     //function of updating product  
     function update(Request $request,$id){

             $request->validate([
                'name' => 'required',
                'images' => 'required|mimes:jpg,jpeg,png',
                'description' => 'required|max:200',
                'price' => 'required',
                'store'=> 'required',
             ]);

            if($request->hasFile('images')){
                $file= $request->file('images');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('images/product'), $filename);

                $product=DB::table('products')->where('id', $request->id)
                ->update(['name' => $request->name,'image' =>$filename,'description' => $request->description,'store' => $request->store,'price' => $request->price]);
                
                return response()->json([
                    "Message"=>"Product successful edited",
                    ],201);
            
            }


    }

       /**
     * @OA\Delete(
     *      path="/api/product/delete/{id}",
     *      operationId="productDestroy",
     *      tags={"Products"},
     *      summary="Destroy product",
     *      description="Delete the product",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *          name="id",
     *          description="Enter product id .",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad user Input",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     *     )
     */


    //function to destroy product
    function destroy(Request $request,$id){
        $id=$request->id;
        $product=DB::table('products')
                ->find($id)->delete();

            if($product){
                return response()->json([
                    'message' => 'This Product is deleted !',
                ]); 
            }else{
                 return response()->json([
                    'message' => 'Invalid id !',
                ]);
            }  

       
             return response()->json([
                'message' => 'Unauthorized',
            ]);  
        
    }


}
