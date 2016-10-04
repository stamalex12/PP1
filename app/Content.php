<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    //protected $fillable = ['pageId, title, content, sortOrder'];
    protected $fillable = ['pageId', 'title', 'content', 'sortOrder', 'image', 'type'];

    protected $attributes = array(
        'status' => 'Active',
    );

    public function page() {
        return $this->belongsTo('App\Page'); // this matches the Eloquent model
    }
}
