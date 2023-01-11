<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compose;
use App\Models\Like;


class LikeController extends Controller
{
    public function like(Compose $compose, Request $request) {
        $like = Like::create(['user_id' => $request->user_id, 'compose_id' => $compose->id]);

        $likeCount = count(Like::where(['compose_id' => $compose->id])->get());

        return response()->json(['likeCount' => $likeCount]);
    }
    
    public function unlike(Compose $compose, Request $request) {
        $like = Like::where(['user_id'=> $request->user_id])->where(['compose_id'=> $compose->id])->first();
        $like->delete();

        $likeCount = count(Like::where(['compose_id' => $compose->id])->get());

        return response()->json(['likeCount' => $likeCount]);
    }

}
