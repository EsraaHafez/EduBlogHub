<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    //
    public function store(Request $request, $PostID)
{
    $request->validate([
        'Content' => 'required|string|max:255',
    ]);

    Comment::create([
        'Content' => $request->Content,
        'PostID' => $PostID,
        'AuthorID' => auth()->id(), // يجب أن يكون مرتبطاً بالمستخدم المسجل حالياً
        'DateCreated' => now(),
    ]);
    
        //  return redirect()->route('web.post', $PostID)->with('success', 'Comment added successfully.');
         // return redirect()->back()->with('success', 'Comment added successfully.');
         return redirect()->back()->with('success');


    }
 
    public function update(Request $request, $CommentID)
    {
        // التحقق من القواعد الخاصة بالتعليق
        $request->validate([
            'Content' => 'required|string|max:255',
        ]);
    
        // جلب التعليق باستخدام المعرف
        $comment = Comment::findOrFail($CommentID);
    
        // التحقق من صلاحيات المستخدم
        if (Auth::user()->id !== $comment->AuthorID) {
            return redirect()->route('web.post', $comment->PostID)->with('error', 'Unauthorized action.');
        }
    
        // تحديث محتوى التعليق
        $comment->Content = $request->input('Content');
        $comment->save();
    
        return redirect()->route('web.post', $comment->PostID)->with('success', 'Comment updated successfully.');
    }
    





    public function destroy($id)
{
    // جلب التعليق باستخدام المعرف
    $comment = Comment::findOrFail($id);

    // التحقق من صلاحيات المستخدم
    if (Auth::user()->id !== $comment->AuthorID) {
        return redirect()->route('web.post', $comment->PostID)->with('error', 'Unauthorized action.');
    }

    // حذف التعليق
    $comment->delete();

    return redirect()->route('web.post', $comment->PostID)->with('success', 'Comment deleted successfully.');
}

    

}

