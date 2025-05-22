<?php

namespace App\Http\Controllers;

use App\Http\Resources\Article\ArticleCollection;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // index
    public function index()
    {
        $articles = Article::with(['category:id,name'])->get(['id', 'title', 'content', 'photo', 'category_id', 'created_at']);
        return response()->json([
            'data' => new ArticleCollection($articles),
            'message' => 'get articles successfully',
            'status' => 200
        ]);
    }
    public function store(Request $req)
    {
        $req->validate([
            "title"         => "required|string",
            "content"       => "required|string",
            "photo"         => "nullable|image|mimes:jpg,png,jpeg|max:2048",
            "category_id"   => "required",
            // "user_id"       => "required",
        ]);

        // $user = User::where("id", $req->user_id)->first(['id']);
        // if (!$user) return response()->json([
        //     'data' => [],
        //     'message' => 'user not found',
        //     'status' => 404
        // ]);


        $article = new Article();
        $article->title = $req->input("title");
        $article->content = $req->input("content");
        $article->category_id = $req->input("category_id");
        // $article->user_id = $req->input("user_id");

        if ($req->hasFile("photo")) {
            $photo = $req->file("photo");
            $file_content = file_get_contents($photo->getPathName());
            $fileName = $photo->hashName();
            Storage::disk('public')->put("/photos" . "/" . $fileName, $file_content);
            $article->photo = $fileName;
        }

        $article->save();

        return response()->json([
            'data' => new ArticleResource($article),
            'message' => 'get article successfully',
            'status' => 200
        ]);
    }

    // show
    public function show($id)
    {
        $article = Article::where('id', $id)->with(['category:id,name'])->first(['id', 'title', 'content', 'photo', 'category_id', 'created_at']);
        if (!$article) return response()->json([
            'data' => [],
            'message' => 'article not found',
            'status' => 404
        ]);
        return response()->json([
            'data' => new ArticleResource($article),
            'message' => 'get article successfully',
            'status' => 200
        ]);
    }

    // update
    public function update(Request $req, $id)
    {
        $req->validate([
            "title"         => "required|string",
            "content"       => "required|string",
            "photo"         => "nullable|image|mimes:jpg,png,jpeg|max:2048",
            "category_id"   => "required",
            // "user_id"       => "required",
        ]);

        // $user = User::where("id", $req->user_id)->first(['id']);
        // if(!$user) return response()->json([
        //     'data' => [],
        //     'message' => 'user not found',
        //     'status' => 404
        // ]);

        $article = Article::where('id', $id)->first(['id', 'title', 'content', 'photo', 'category_id', 'created_at']);
        if (!$article) return response()->json([
            'data' => [],
            'message' => 'article not found',
            'status' => 404
        ]);

        $article->title = $req->input("title");
        $article->content = $req->input("content");
        $article->category_id = $req->input("category_id");
        // $article->user_id = $req->input("user_id");

        if ($req->hasFile("photo")) {
            Storage::disk('public')->delete("/photos" . "/" . $article->photo);
            $photo = $req->file("photo");
            $file_content = file_get_contents($photo->getPathName());
            $fileName = $photo->hashName();
            Storage::disk('public')->put("/photos" . "/" . $fileName, $file_content);
            $article->photo = $fileName;
        }

        $article->save();

        return response()->json([
            'data' => new ArticleResource($article),
            'message' => 'update article successfully',
            'status' => 200
        ]);
    }
    // delete
    public function destroy($id)
    {
        try {
            $article = Article::find($id);
            if (!$article) return response()->json([
                'data' => [],
                'message' => 'article not found',
                'status' => 404
            ]);
            Storage::disk('public')->delete("/photos" . "/" . $article->photo);
            $article->delete();
            return response()->json([
                'data' => [],
                'message' => 'delete article successfully',
                'status' => 200
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'data' => [],
                'message' => $e->getMessage(),
                'status' => 500
            ]);
        }
    }
}
