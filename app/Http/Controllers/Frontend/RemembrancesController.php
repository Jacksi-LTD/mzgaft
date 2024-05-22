<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Audio;
use App\Models\AudioBook;
use App\Models\Category;
use App\Models\Person;
use App\Models\Remembrance;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RemembrancesController extends Controller
{
    public function index()
    {
       
        $categories = Category::where(['type'=> 'remembrance','category_id'=>null])->orderBy('created_at', 'DESC')->get();

        return view('frontend.remembrances.index', compact('categories'));
    }


    public function category(Category $category)
    {
        $remembrances = Remembrance::with('category')->where('category_id', $category->id)->orderBy('sort','ASC')->paginate();


        return view('frontend.remembrances.category', compact('remembrances', 'category'));
    }



    public function show(Remembrance $remembrance)
    {

        return view('frontend.remembrances.show', compact('remembrance'));
    }


}
