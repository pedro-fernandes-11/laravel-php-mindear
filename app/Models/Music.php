<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Validator;

class Music extends Model
{
    protected $table = "music";
    public $timestamps = false;
    protected $fillable = ['nome', 'autor', 'link', 'imagem'];

    use HasFactory;
    protected $rules = [
        'musicName' => 'required|min:2|max:25',
        'musicAuthor' => 'required|min:2|max:25',
        'musicLink' => 'required|min:4|max:50'
    ];

    protected $messages = [
        'musicName.required' => 'Campo nome é obrigatório',
        'musicAuthor.required' => 'Campo autor é obrigatório',
        'musicLink.required' => 'Campo link é obrigatório',
        'musicName.min' => 'Mínimo de 2 caracteres para o campo nome',
        'musicAuthor.min' => 'Mínimo de 2 caracteres para o campo autor',
        'musicLink.min' => 'Mínimo de 4 caracteres para o campo link',
        'musicName.max' => 'Máximo de 25 caracteres para o campo nome',
        'musicAuthor.max' => 'Máximo de 25 caracteres para o campo autor',
        'musicLink.max' => 'Máximo de 50 caracteres para o campo link',
    ];

    public function validation($inputs){
        $v = Validator::make($inputs, $this->rules, $this->messages);

        if($v->fails()){
            return $v->messages()->get('*');
        }else{
            return true;
        }
    }
}
