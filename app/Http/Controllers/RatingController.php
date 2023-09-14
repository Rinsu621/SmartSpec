<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spec;
use App\Models\Brand;
use App\Models\Compare;
use App\Models\Rating;
use App\Models\User;

class RatingController extends Controller
{
    public function add(Request $request)
        {
            $product_id = $request->input('product_id');
            $stars_rated = (int)$request->input('product_rating');


            // Check if the product with the specified ID exists
            $product_check = Spec::where('id', $product_id)->first();

            if ($product_check) {
                // Check if the user has already rated this product
                $existing_rating = Rating::where('user_id', auth()->id())->where('prod_id', $product_id)->first();

                if ($existing_rating) {
                    // Update the existing rating
                    $existing_rating->stars_rated = $stars_rated;
                    $existing_rating->save();
                } else {
                    // Create a new rating
                    Rating::create([
                        'user_id' => auth()->id(),
                        'prod_id' => $product_id,
                        'stars_rated' => $stars_rated,
                    ]);
                }

                return redirect()->back()->with('status', 'Thank you for rating this Smartphone');
            }

            // Handle the case where the product does not exist
            return redirect()->back()->with('error', 'Product not found');
        }
    }
