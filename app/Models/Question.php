<?php

namespace App\Models;
use GrahamCampbell\Markdown\Facades\Markdown;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\User;

class Question extends Model
{
    use HasFactory;
    use VotableTrait;

    protected $fillable = ['title', 'body'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute(){
        return route('question.show', $this);
    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute(){
        if($this->answers_count > 0){
            if($this->best_answer_id){
                return 'answered_accepted';
            }
            return 'answered';
        }
        else {
            return 'unanswered';
        }
    }

    public function answers(){
        return $this->hasMany(Answer::class)->orderBy('votes_count', 'DESC');
    }

    public function acceptBestAnswer(Answer $answer){
        $this->best_answer_id = $answer->id;
        $this->save();
    }

    public function favorites(){
        return $this->belongsToMany(User::class, 'favorites')->withTimeStamps(); 
    }

    public function isFavorited(){
        return $this->favorites()->where('user_id', auth()->user()->id)->count()>0;
    }

    public function getIsFavoritedAttribute(){
        return $this->isFavorited();
    }

    public function getFavoritesCountAttribute(){
        return $this->favorites()->count();
    }

    public function getAnswerAttribute(){
        return count($this->answers);
    }

    public function getQuestionBodyAttribute(){
        return Markdown::convertToHtml($this->body);
    }
}
