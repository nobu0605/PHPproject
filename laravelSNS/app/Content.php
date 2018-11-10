<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
	// protected $keyType = 'string'; //これを追加
	protected $guarded = array('id');

	public static $rules = array(
        'user_id' => 'required',
        'content' => 'required',
	);

	public function getData(){
		return $this->id . ':' . $this->content;
	}

    public function user()
    {
        return $this->belongsto('App\User');
    }
}
