<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';
    //protected $fillable = ['pageId, title, content, sortOrder'];
    protected $fillable = ['pageId, title, content, sortOrder'];

    public function page() {
        return $this->belongsTo('App/Page'); // this matches the Eloquent model
    }
}
