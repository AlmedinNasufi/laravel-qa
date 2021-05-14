<?php

namespace App\Models;

use App\VotableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    use VotableTrait;
    use HasFactory;

    protected $fillable = ['title', 'body'];
    protected $appends = ['created_date'];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function getUrlAttribute()
    {
        return route('questions.show', $this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if ($this->answers_count > 0){
            if ($this->best_answer_id){
                return "answered-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }
    public function getBodyHtmlAttribute()
    {
        return clean($this->bodyHtml());
    }

//  If we want to clean before storing to database (db)!
//    public function setBodyAttribute($value)
//    {
//        $this->attributes['body'] = clean($value);
//    }

    public function answers()
    {
        return $this->hasMany(Answer::class)->orderBy('votes_count','DESC');
    }

    public function acceptBestAnswer(Answer $answer)
    {
        $this->best_answer_id = $answer->id;
        $this->save();
    }

    public function favorites()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }

    public function isFavorited()
    {
        //this question has been favorited from the user id
        //question 1 has been favorited from user 2
        return $this->favorites()->where('user_id',auth()->id())->count() >0;
    }
    public function getIsFavoritedAttribute()
    {
        return $this->isFavorited();
    }
    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
    public function getExcerptAttribute()
    {
        return $this->excerpt(255);
    }
    public function excerpt($length)
    {
        return Str::limit(strip_tags($this->bodyHtml()), $length);
    }
    public function bodyHtml()
    {
        return \Parsedown::instance()->text($this->body);
    }

}
