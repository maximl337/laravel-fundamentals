<?php namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Auth;
//use Illuminate\Http\Request;



class ArticlesController extends Controller {

    /**
     * 
     */
    public function __construct()
    {
        $this->middleware('auth', ["except" => "index"]);
    }

    /**
     * 
     */
	public function index()
    {
        //return \Auth::user()->name;

        $articles = Article::latest('published_at')->published()->get();

       
        return view('articles.index', compact('articles'));
    }

    /**
     * 
     */
    public function show(Article $article)
    {

        return view('articles.show', compact('article'));
    }

    /**
     * 
     */
    public function create()
    {

        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }

    /**
     * 
     */
    public function store(Requests\ArticleRequest $request)
    {
        

        $this->createArticle($request);

        flash()->overlay('Your article was created', 'Good Job');

        return redirect('articles');
    }

    /**
     * 
     */
    public function edit(Article $article)
    {
        
        $tags = Tag::lists('name', 'id');  

        return view('articles.edit', compact('article', 'tags'));
    }

    /**
     * 
     */
    public function update(Article $article, Requests\ArticleRequest $request)
    {
       
        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }

    /**
     * Sync tags of article in DB
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }


    /**
     * Create a new article
     */
    private function createArticle(Requests\ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }
}
