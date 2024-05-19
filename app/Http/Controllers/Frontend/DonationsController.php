<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Donation;
use App\Models\Person;
use App\Models\Prayer;
use App\Models\Tajweed;
use App\Models\User;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class DonationsController extends Controller
{

    public function index()
    {
        $donations = Donation::with('media')->orderBy('id','desc')->paginate(6);


        return view('frontend.donations.index', compact('donations'));
    }

}
