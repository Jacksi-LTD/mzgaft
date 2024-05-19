<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Person;
use App\Models\Prayer;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PrayerController extends Controller
{

    public function index()
    {
        $prayer = Prayer::with('media')->paginate();


        return view('frontend.prayer.index', compact('prayer'));
    }

    public function show(Prayer $prayer)
    {


        $prayer->load( 'media.model');

        return view('frontend.prayer.show', compact('prayer'));
    }
}
