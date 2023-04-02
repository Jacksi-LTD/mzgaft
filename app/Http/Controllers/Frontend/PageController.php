<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::all();

        return view('frontend.pages.index', compact('pages'));
    }

    public function show($slug)
    {

        $page = Page::where('slug', $slug)->first();
        
        return view('frontend.pages.show', compact('page'));
    }
}
