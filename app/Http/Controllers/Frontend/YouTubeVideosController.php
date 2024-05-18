<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Person;
use App\Models\User;
use App\Models\YoutubeVideo;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class YouTubeVideosController extends Controller
{
    public function index()
    {
        // $categories = Category::where('type', 'books')->orderBy('created_at', 'DESC')->get();
        $categories = Category::where(['type'=> 'youtubevideos','category_id'=>null])->orderBy('created_at', 'DESC')->get();

        return view('frontend.youtubevideos.index', compact('categories'));
    }

    public function category(Category $category)
    {
        $videos = YoutubeVideo::with([ 'category', 'media'])->where('category_id', $category->id)->paginate();


        return view('frontend.youtubevideos.category', compact('videos', 'category'));
    }



    public function show($id)
    {
        /*
        if (isset($book->visits)) {
            Book::find($book->id)->increment('visits');
        } else {
            $book->visits = 1;
            $book->save();
        }*/
        $youtubeVideo=YoutubeVideo::findOrFail($id);

        $youtubeVideo->load( 'category', 'media.model');

        return view('frontend.youtubevideos.show', compact('youtubeVideo'));
    }
}
