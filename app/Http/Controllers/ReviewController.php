<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\persons;
use App\Http\Controllers\CustomAuthController;

class ReviewController extends Controller
{
    //
    public function reviewstore(Request $request){
        $review = new Review();
        $review->title = $request->title;
        $review->review= $request->review;
        $review->rating = $request->rating;
        $review->userId = persons::where('id',Session::get('loginId'))->first;
        $review->storeId = $request->store_id;
        $review->save();
        return redirect()->back()->with('flash_msg_success','Your review has been submitted Successfully,');
    }
}
