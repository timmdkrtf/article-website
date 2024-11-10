<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Main;
use DOMDocument;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function article(Request $request)
    {
        $articles = Article::paginate(5);

        $term = $request->input('search');
        if($term){
            $articles = Article::where("title", "LIKE", "%$term%")
                ->orWhereHas("category", function ($query) use ($term){
                    $query->where('category', 'LIKE', "%$term%");
                })
                ->orWhereHas("main", function ($query) use ($term){
                    $query->where('title', 'LIKE', "%$term%");
                })
            ->paginate(100);
        }else{
            $articles = Article::paginate(5);
        }

        return view('admin.article.index',compact('articles'));
    }

    public function createArticle()
    {
        $categories = Category::all();
        $mains = Main::all();
        return view('admin.article.create', compact('categories', 'mains'));
    }

    public function createArticlePost(Request $request)
    {
        $desc = $request->desc;

        $dom = new DOMDocument();
        $dom->loadHTML($desc,9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
            $image_name = "/upload/" . time(). $key.'.png';
            file_put_contents(public_path().$image_name,$data);

            $img->removeAttribute('src');
            $img->setAttribute('src',$image_name);
        }
        $desc = $dom->saveHTML();

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $covername = 'cover' . uniqid() . '_' . $cover->getClientOriginalName();
            $cover->move(public_path('cover'), $covername);
        }

        Article::create([
            'title' => $request->title,
            'desc' => $desc,
            'cover' => $covername,
            'main_id' => $request->main_id,
            'category_id' => $request->category_id
        ]);

        return redirect('/article')->with('toast_success', 'Add Article Successfull');
    }

    public function showArticle($id)
    {
        $article = Article::find($id);
        return view('admin.article.show-article',compact('article'));
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        $mains = Main::all();
        return view('admin.article.edit',compact('article','categories', 'mains'));
    }

    public function update(Request $request, $id)
    {
        $post = Article::find($id);

        $desc = $request->desc;
        $dom = new DOMDocument();
        $dom->loadHTML($desc,9);

        $images = $dom->getElementsByTagName('img');
        foreach ($images as $key => $img) {
            if (strpos($img->getAttribute('src'),'data:image/') ===0) {

                $data = base64_decode(explode(',',explode(';',$img->getAttribute('src'))[1])[1]);
                $image_name = "/upload/" . time(). $key.'.png';
                file_put_contents(public_path().$image_name,$data);

                $img->removeAttribute('src');
                $img->setAttribute('src',$image_name);
            }
        }
        $desc = $dom->saveHTML();

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $covername = 'cover' . uniqid() . '_' . $cover->getClientOriginalName();
            $cover->move(public_path('cover'), $covername);
        }

        $post->update([
            'title' => $request->title,
            'desc' => $desc,
            'cover' => $covername,
            'main_id' => $request->main_id,
            'category_id' =>$request->category_id
        ]);

        return redirect('/article')->with('toast_success', 'Edit Article Successfull');
    }

    public function destroyArticle($id)
    {
        $post = Article::find($id);

        $dom= new DOMDocument();
        $dom->loadHTML($post->desc,9);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $key => $img) {
            $src = $img->getAttribute('src');
            $path = Str::of($src)->after('/');

            if (File::exists($path)) {
                File::delete($path);
            }
        }

        if ($post->cover) {
            $coverPath = public_path('cover') . '/' . $post->cover;
            if (File::exists($coverPath)) {
                File::delete($coverPath);
            }
        }

        $post->delete();
        return redirect()->back()->with('toast_success', 'Delete Article Successfull');
    }
}
