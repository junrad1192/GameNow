<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class UserController extends Controller
{
    public function show(Request $request,$id)
    {
        $user = User::find($id);
        $compose = DB::table('users')
        ->join('composes','users.id','=','composes.user_id')
        ->select('composes.title','composes.image','composes.point','composes.user_id','composes.id','users.name','users.id as user_id')
        ->where('user_id',$id)
        ->get();

        return view('user.show',['user' => $user,'compose' => $compose]);
    }

   public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit',['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $user=User::find($id);
    
        $user->name = $request->input('name');
        $user->save();
    
        return redirect()->route('user.show',['id' => $id]);
    }
}
