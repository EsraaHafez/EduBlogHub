<?php
// app/Models/Comment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';
    protected $primaryKey = 'CommentID';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'Content',
        'PostID',
        'AuthorID',
        'DateCreated',
    ];

    public function post()
    {
        return $this->belongsTo(Blogpost::class, 'PostID');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'AuthorID');
    }
/* 

    public function user()
    {
        return $this->belongsTo(User::class, 'AuthorID');  
    } */
}
