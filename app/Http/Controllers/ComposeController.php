<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Compose;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreComposeRequest;
use App\Http\Requests\UpdateComposeRequest;
use Illuminate\Support\Facades\DB;



class ComposeController extends Controller
{

    public function index(Compose $compose) {
        $compose = DB::table('users')
        ->join('composes','users.id', '=', 'composes.user_id')
        ->select('composes.title', 'composes.image', 'composes.point', 'composes.user_id', 'composes.id', 'users.name','composes.created_at')
        ->orderBy('composes.id','desc')
        ->get();

        $userAuth = \Auth::user();

        $comp = new Compose;
        $comp->load('likes');
        $defaultCount = count($comp->likes);
        $defaultLiked = $comp->likes->where('user_id',$userAuth->id)->first();

        if(is_array($defaultLiked)) {
            $defaultLiked == false;
        } else {
            $defaultLiked == true;
        }
        return view('index', [
            'compose' => $compose,
            'userAuth' => $userAuth,
            'defaultLiked' => $defaultLiked,
            'defaultCount' => $defaultCount,
        ]);
        
    }

    public function create() {
        return view('create');
    }

    public function store(StoreComposeRequest $request) {
        $compose = new Compose();

        if($file = $request->image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = null;
        }

        $compose->title = $request->input('title');
        $compose->image = $fileName;
        $compose->point = $request->input('point');
        $compose->user_id = Auth::id();

        $compose->save();

        return redirect('index');
    }

    public function edit($id) {
        $compose = Compose::find($id);

        if(Auth::id() != $compose->user_id) {
            return redirect('index');
        }
        
        return view('edit', ['compose' => $compose]);
    }


    public function show($id) {
        $compose = Compose::find($id);

        return view('show', ['compose' => $compose]);
    }

    public function update(UpdateComposeRequest $request, $id) {
        $compose = Compose::find($id);

        if($file = $request->image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = null;
        }

        $compose->title = $request->input('title');
        $compose->image = $fileName;
        $compose->point = $request->input('point');
        $compose->user_id = Auth::id();

        $compose->save();

        return redirect('index');
    }

    public function delete($id) {
        $compose = Compose::find($id);

        $compose->delete();

        return redirect('index');
    }    
}