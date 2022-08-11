<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;
class CustomerController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/customer/show/order",
     *      operationId="ProductOrders",
     *      tags={"Customer"},
     *      summary="Show product orders",
     *      description="Show orders's product",
     *      security={{"bearer_token":{}}},
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
    function show(){

        $product=booking::all();
        $count=collect($product)->count();
         if ( $count > 0) {
            return response()->json([
                'message' => 'Orders of customers',
                'product' => $product,
             ]); 
        }elseif($count == 0){
            return response()->json([
                'message' => 'no data found',
            ]);  
        }
    
    }

    /**
     * @OA\Post(
     *      path="/api/customer/booking/{id}",
     *      operationId="BookingProduct",
     *      tags={"Customer"},
     *      summary="Booking product",
     *      description="Customer booking product",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(
     *          name="cust_name",
     *          description="Enter Customer name.",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
    *      @OA\Parameter(
     *          name="cust_phone",
     *          description="Enter Customer phone.",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *     @OA\Parameter(
     *          name="cust_email",
     *          description="Enter Customer email.",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *      @OA\Parameter(
     *          name="cust_address",
     *          description="Enter Customer address.",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *      @OA\Parameter(
     *          name="product_count",
     *          description="Enter product count.",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
     *          )
     *       ),
     *      @OA\Parameter(
     *          name="product_id",
     *          description="product id to be booked .",
     *          required=true,
     *          in="query",
     *          @OA\Schema(
     *              type="string"
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

    function booking(Request $request,$id){
             $request->validate([
                'cust_name' => 'required|string',
                'cust_email' => 'required|email',
                'cust_phone' => 'required|min:10',
                'cust_address' => 'required',
                'product_id' => 'required',
                'product_count' => 'required|numeric',
             ]);

            $product=new booking;
            $product->cust_name = $request->cust_name; 
            $product->cust_email= $request->cust_email;
            $product->cust_phone = $request->cust_phone;
            $product->cust_address = $request->cust_address;
            $product->product_counts = $request->product_count;
            $product->product_id=$request->product_id;
            $product->save();
            
            if ($product) {
                return response()->json([
                    'message' => 'Booking created',
                    'product' => $product,
                 ]); 
            }else{
                return response()->json([
                    'message' => 'Booking Error',
                    'product' => $product,                
                ]);  
            }
        
    }

}
