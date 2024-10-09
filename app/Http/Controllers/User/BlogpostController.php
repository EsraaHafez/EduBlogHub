<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Blogpost;
use App\Models\User;
use App\Models\Comment;


class BlogpostController extends Controller
{
    // عرض جميع المشاركات
    public function index()
    { 
        $posts = Blogpost::all();
        return view('web.posts', compact('posts'));
    }


           // عرض جميع المشاركات
           public function displaypost()
           { 
                // جلب البيانات من قاعدة البيانات
                  $posts = Blogpost::orderBy('created_at', 'desc')->take(4)->get();
           
                     // التأكد من تمرير البيانات إلى الـ view
                      return view('web.index', compact('posts'));
    
           }
    
    // عرض مشاركة واحدة
/*      public function show($PostID)
    {
        $post = Blogpost::findOrFail($PostID);
       // return view('web.post', compact('post'));
        return view('web.post', ['post' => $post]);

    }   */


    public function show($PostID)
    {
        // العثور على المنشور
        $post = Blogpost::find($PostID);
        $comments = Comment::where('PostID', $PostID)->get();
    
        // التحقق من وجود المنشور
        if (!$post) {
            return redirect()->route('posts.index')->with('error', 'Post not found.');
        }
    
        // تحميل بيانات المؤلف المرتبطة بالمنشور إذا كان موجوداً
        $author = $post->author; // افترض أن هناك علاقة `author` بين Post و User
        $comments = $post->comments;
        // تمرير المنشور والمؤلف إلى العرض
        return view('web.post', compact('post', 'author' , 'comments'));

    }

    // عرض نموذج إنشاء مشاركة جديدة
    public function create()
    {
        return view('web.new-post');
    }

    // تخزين مشاركة جديدة
    public function store(Request $request)
    {
        $request->validate([
            'Post_title' => 'required|string|max:255',
            'Classification' => 'required|string',
            'image_url' => 'required|image',
            'Post_content' => 'required|string',
        ]);

        $post = new Blogpost();
        $post->Post_title = $request->Post_title;
        $post->Classification = $request->Classification;
        $post->Post_content = $request->Post_content;

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public');
            $post->image_url = $imagePath;
        }

        $post->save();

        return redirect()->route('web.posts');
    }

    // عرض نموذج تعديل مشاركة
    public function edit($PostID)
    {
        $post = Blogpost::findOrFail($PostID);
        return view('web.edit', compact('post'));
    }

    // تحديث مشاركة
    public function update(Request $request, $PostID)
    {
        $request->validate([
            'Post_title' => 'required|string|max:255',
            'Classification' => 'required|string',
            'image_url' => 'nullable|image',
            'Post_content' => 'required|string',
        ]);

        $post = Blogpost::findOrFail($PostID);
        $post->Post_title = $request->Post_title;
        $post->Classification = $request->Classification;
        $post->Post_content = $request->Post_content;

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public');
            $post->image_url = $imagePath;
        }

        $post->save();

        return redirect()->route('web.posts');
    }

    // حذف مشاركة
    public function destroy($PostID)
    {
        $post = Blogpost::findOrFail($PostID);
        $post->delete();

        return redirect()->route('web.posts');
    }
}
