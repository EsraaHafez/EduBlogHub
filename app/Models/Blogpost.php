<?php
// app/Models/Blogpost.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    use HasFactory;

    protected $table = 'blogpost';
    protected $primaryKey = 'PostID';
    public $incrementing = false;
    protected $keyType = 'int';

    protected $fillable = [
        'Post_title',
        'Post_content',
        'AuthorID',
        'DateCreated',
        'Classification',
        'image_url',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'AuthorID');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'PostID');
    }
}
