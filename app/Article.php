<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Article extends Model {


	protected $fillable = [
        'title',
        'body',
        'published_at',
        'user_id' //Temporary
    ];

    protected $dates = ['published_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the tag asociated with the article
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }
    
    /**
     * 
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    /**
     * 
     */
    public function getPublishedAtAttribute($date)
    {
        return new Carbon($date);
    }

    /**
     * 
     */
    public function scopePublished($query)
    {
        $query->where('published_at', '<=' , Carbon::now());
    }

    /**
     * 
     */
    public function scopeUnpublished($query)
    {
        $query->where('published_at', '>' , Carbon::now());
    }

    /**
     * Get a list of tag ids assoc with the curent article
     */
    public function getTagListAttribute()
    {
        return $this->tags->lists('id');
    }
 
}
