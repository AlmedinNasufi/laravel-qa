<?php

namespace App\Models;


use App\VotableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use VotableTrait;
    use HasFactory;

    protected $fillable = ['body', 'user_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyHtmlAttribute()
    {
        return clean(\Parsedown::instance()->text($this->body));
    }

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::created(function ($answer){
            $answer->question->increment('answers_count');
        });

        static::deleted(function ($answer){
            //the first way -- git lesson 19-a
//            $question = $answer->question;
//            $question->decrement('answers_count');
//
//            if ($answer->id === $question->best_answer_id)
//            {
//                $question->best_answer_id = NULL;
//                $question->save();
//            }

            // the second way -- git lesson 19-b
            $answer->question->decrement('answers_count');
        });
    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function isBest()
    {
        return $this->id == $this->question->best_answer_id;
    }

    public function getStatusAttribute()
    {
        return $this->isBest() ? 'vote-accepted' : '';
    }

    public function getIsBestAttribute()
    {
        return $this->isBest();
    }


}
