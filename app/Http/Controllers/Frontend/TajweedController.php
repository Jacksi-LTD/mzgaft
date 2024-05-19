<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Person;
use App\Models\Prayer;
use App\Models\Tajweed;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class TajweedController extends Controller
{

    public function index()
    {
        $tajweed = Tajweed::with('media')->paginate();


        return view('frontend.tajweed.index', compact('tajweed'));
    }

    public function show(Tajweed $tajweed)
    {


        $tajweed->load( 'media.model');

        return view('frontend.tajweed.show', compact('tajweed'));
    }
}
