<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $fillable = [
		'img', 'title', 'content','slug','categorie_id'
  ];

  public function categorie(){
	return $this->belongsTo('App\Categorie');
  }

  public function tags(){
	return $this->belongsToMany('App\Tag');
  }
}
