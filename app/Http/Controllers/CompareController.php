<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Spec;
use App\Models\Brand;
use App\Models\Compare;
use App\Models\Rating;

class CompareController extends Controller
{
   public function index()
   {

    $specs=Spec::all();
    $brands=Brand::all();
    $ratings = [];

    foreach ($specs as $spec) {
        $productRatings = Rating::where('prod_id', $spec->id)->get();
        $ratings[$spec->id] = $productRatings; // Store the ratings for this product in the array

        // Calculate the average rating for this product
        $rating_sum = $productRatings->sum('stars_rated');
        $rating_count = count($productRatings);
        $rating_value = ($rating_count > 0) ? ($rating_sum / $rating_count) : 0;

        // Store the average rating in the ratings array
        $ratings[$spec->id . '_average'] = $rating_value;
        $rate=$ratings[$spec->id . '_average'];
    }
    return view('User.compare')->with(compact('specs','brands' ,'ratings','rate'));
   }
   // Method to handle the AJAX request for adding products to compare
   public function addToCompare(Request $request)
   {

       // Retrieve the product_id from the AJAX request data
      $productId = $request->input('product_id');
      $user_id = auth()->id();

      //check if the user has already stored the product, you
      $check_if_already_added = Compare::where('user_id',$user_id)->where('prod_id',$productId)->count();
      if($check_if_already_added > 0){
         //since the user has clicked the same product again, we need to remove it from the database now
         $remove_product_from_table = Compare::where('user_id',$user_id)->where('prod_id',$productId)->delete();
         return response()->json([
            'status'  => 'true',
            'action'  => 'removed', //this is a boolean for jquery to change the color of the compare button
            'message' => 'Product removed from the compare'
         ]);
      }
      $add_to_compare = Compare::create([
         'user_id' => $user_id,
         'prod_id' => $productId
      ]);
       // Return a JSON response indicating success
       return response()->json([
         'status'  => 'true',
         'action'  => 'added',//this is a boolean for jquery to change the color of the compare button
         'message' => 'Product added to compare successfully'
      ]);
   }
   public function removeFromCompare(Request $request){


       // Retrieve the product_id from the AJAX request data
       $specId = $request->input('specId');
       $user_id = auth()->id();

       //check if the user has already stored the product, you
       $check_if_already_added = Compare::where('id',$specId)->delete();
        return response()->json([
          'status'  => 'true',
          'action'  => 'added',//this is a boolean for jquery to change the color of the compare button
          'message' => 'Product removed from compare'
       ]);
   }
}
