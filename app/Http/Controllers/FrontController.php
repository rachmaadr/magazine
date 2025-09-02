<?php

namespace App\Http\Controllers;

use App\Models\ArtikelNews;
use App\Models\Author;
use App\Models\BannerAds;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $categories = Category::all();
        $artikels = ArtikelNews::with(['category'])
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(3)
        ->get();
        $authors = Author::all();
        $featuredArtikels = ArtikelNews::with('category')
        ->where('is_featured', 'not_featured')
        ->inRandomOrder()
        ->take(3)
        ->get();
        $bannerAds = BannerAds::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        ->get();
        return view('front.index', compact('categories', 'authors', 'artikels', 'featuredArtikels', 'bannerAds'));
    }
}
