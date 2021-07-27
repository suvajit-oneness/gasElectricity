<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon,App\Model\Product;
use App\Model\BlogCategory,App\Model\Blog;
use App\Model\State,App\Model\UserPoints;
use App\Model\BlogComment,App\Model\BlogLike;

class APIController extends Controller
{
    // **************************** Blog ********************************
    public function blogsCategory(Request $req)
    {
        $category = BlogCategory::get();
        return successResponse('Blog Categories',$category);
    }

    public function blogList(Request $req)
    {
        $blogs = Blog::select('*');
        if(!empty($req->categoryId)){
            $blogs = $blogs->where('blogCategoryId', $req->categoryId);
        }
        $blogs = $blogs->with('posted')->get();
        foreach($blogs as $blog){
            $blog->category;

            $comment = $blog->comment;
            $blog->countComment = count($comment);

            $likes = $blog->likes;
            $blog->countLike = count($likes);
            $blog->avgRating = findAVG($likes);
        }
        
        if(count($blogs) > 0) {
            return successResponse('Blogs by category',$blogs);
        } else {
            return successResponse('No blogs found');
        }
    }

    public function saveBlogComment(Request $req)
    {
        $rules = [
            'blogId' => 'required|min:1|numeric',
            'userId' => 'required|min:1|numeric',
            'comment' => 'required|string',
        ];
        $validate = validator()->make($req->all(),$rules);
        if(!$validate->fails()){
            $newComment = new BlogComment();
            $newComment->blogId = $req->blogId;
            $newComment->userId = $req->userId;
            $newComment->comment = $req->comment;
            $newComment->save();
            $newComment->time = date('d M, Y H:i:A');
            return successResponse('Blog Comment Saved ',$newComment);
        }
        return errorResponse($validate->errors()->first());
    }

    public function saveBlogLikeorUnlike(Request $req)
    {
        $rules = [
            'blogId' => 'required|min:1|numeric',
            'userId' => 'required|min:1|numeric',
            'like' => 'required|numeric|in:1,0',
            'rating' => 'nullable',
        ];
        $validate = validator()->make($req->all(),$rules);
        if(!$validate->fails()){
            $count = 0;
            $like = BlogLike::where('blogId',$req->blogId)->where('userId',$req->userId)->first();
            if(!$like){
                $count = 1;
                $like = new BlogLike();
                $like->blogId = $req->blogId;
                $like->userId = $req->userId;
            }
            $like->rating = 5;
            $like->save();
            if($req->like == 0){
                $count = -1;
                $like->delete();
            }
            return successResponse('Blog Like Saved ',['count' => $count]);
        }
        return errorResponse($validate->errors()->first());
    }

    // **************************** State ********************************
    public function getStates(Request $req)
    {
        $states = State::select('*');
        if(!empty($req->countryId)) {
            $states = $states->where('countryId', $req->countryId);
        }
        $states = $states->with('country')->get();
        if(count($states) > 0) {
            return successResponse('States by country',$states);
        } else {
            return successResponse('No states found');
        }
    }

    // **************************** Product ********************************
    public function productList(Request $req)
    {
        $products = Product::select('*');
        if(!empty($req->productId)) {
            $products = $products->where('id', $req->productId);
        }
        $products = $products->with('company', 'feature', 'product_gas', 'product_electricty', 'product_discount', 'product_momentum')->get();
        foreach($products as $product){
            $rating = $product->product_rating;
            $product->avgRating = findAVG($rating);
        }
        return successResponse('States by country',$products);
    }

    // **************************** User Point ********************************
    public function getUserPoints(Request $req)
    {
        $userPoints = UserPoints::select('*');
        if(auth()->user()->user_type != 1) {
            $userPoints = $userPoints->where('userId', auth()->user()->id);
        } else {
            if(!empty($req->userId)) {
                $userPoints = $userPoints->where('userId', $req->userId);
            } else {
                return errorResponse('UserId can not be empty');
            }
        }
        $userPoints = $userPoints->get();
        $points = [];
        $exp_points = 0;
        $redeem_points = 0;
        $remain_points = 0;
        if($userPoints) {
            foreach ($userPoints as $val) {
                $dayDiff = Carbon::parse($val->created_at)->floatDiffInDays(date("Y-m-d H:i:s"));
                if($dayDiff >= 365){
                    $exp_points = $exp_points+($val->points);
                    $points['expired_points'] = $exp_points;
                    $points['expired'][] = $val;
                } else {
                    if($val->points < 0){
                        $redeem_points = $redeem_points+($val->points);
                        $points['reedemed_points'] = $redeem_points;
                        $points['reedemed'][] = $val;
                    } else {
                        $remain_points = $remain_points+($val->points);
                        $points['remaining_points'] = $remain_points;
                        $points['remaining'][] = $val;
                    }
                }
            }
            $total = $exp_points+$remain_points;
            $points['total_points'] = $total;
            return successResponse('Points', $points);
        }
        return successResponse('No points', $points);
    }
}
