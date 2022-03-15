<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Music;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'update', 'destroy', 'add', 'show']);
    }
    public function index()
    {
        $musicRecords = 5;
        $music = Music::simplePaginate($musicRecords);

        return view('music', compact('music'));
    }

    public function create(){}

    public function add(){
        return view('add');
    }

    public function store(Request $request)
    {
        $table = new Music;

        $validator = $table->validation($request->all());

        if($validator === true){
            $timestamp = \Carbon\Carbon::now()->toDateTimeString();
            $newImgName = md5($timestamp);
            $extension = $request->musicPic->extension();
            $newImgCompleteName = $newImgName .".". $extension;
    
            $path = $request->musicPic->move('storage/uploads', $newImgCompleteName);
    
            $table->nome = $request->musicName;
            $table->autor = $request->musicAuthor;
            $table->link = $request->musicLink;
            $table->imagem = $newImgCompleteName;

            $table->save();
    
            return redirect()->route('music');
        }else{
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
    }

    public function show($id){
        $data = Music::where('id', $id)->get(['id', 'nome', 'autor', 'link', 'imagem']);
        
        return view ('update', compact('data'));
    }

    public function edit($id){}

    public function update(Request $request){
        $table = new Music;

        $validator = $table->validation($request->all());

        if($validator === true){
            $oldImageName = Music::where('id', $request->id)->get('imagem')[0]->imagem;
        
            $timestamp = \Carbon\Carbon::now()->toDateTimeString();
            $newImgName = md5($timestamp);
            $extension = $request->musicPic->extension();
            $newImgCompleteName = $newImgName .".". $extension;

            $path = $request->musicPic->move('storage/uploads', $newImgCompleteName);

            File::delete(public_path("storage/uploads/".$oldImageName));

            Music::where('id', $request->id)->update(['nome' => $request->musicName, 'autor' => $request->musicAuthor, 'link' => $request->musicLink, 'imagem' => $newImgCompleteName]);

            return redirect()->route('music');
        }else{
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
    }

    public function destroy($id){
        $imageName = Music::where('id', $id)->get('imagem')[0]->imagem;
        
        $item = Music::find($id);
        $item->delete();

        File::delete(public_path("storage/uploads/".$imageName));

        return redirect()->route('music');
    }
}
