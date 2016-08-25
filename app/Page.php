<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $table = 'page';
    protected $fillable = ['name'];

    public function content() {
        return $this->hasMany('App\Content', 'pageId'); // this matches the Eloquent model
    }
}
