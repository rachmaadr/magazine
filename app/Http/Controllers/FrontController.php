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

        //menampilkan artikel berdasarkan kategori not featured
        $entertainment_articles = ArtikelNews::whereHas('category', function ($query){
            $query->where('name', 'Entertainment');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(3)
        ->get();

        $business_articles = ArtikelNews::whereHas('category', function ($query){
            $query->where('name', 'Business');
        })->where('is_featured', 'not_featured')->latest()->take(3)->get();

        $automotive_articles = ArtikelNews::whereHas('category', function ($query){
            $query->where('name', 'Automotive');
        })->where('is_featured', 'not_featured')->latest()->take(3)->get();

        //menampilkan artikel berdasarkan kategori featured
        $entertainment_featured_articles = ArtikelNews::whereHas('category', function ($query){
            $query->where('name', 'Entertainment');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->first();

        $business_featured_articles = ArtikelNews::whereHas('category', function ($query){
            $query->where('name', 'Business');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->first();

        $automotive_featured_articles = ArtikelNews::whereHas('category', function ($query){
            $query->where('name', 'Automotive');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->first();

        return view('front.index', compact('categories', 'authors', 'artikels', 'featuredArtikels', 'bannerAds', 'entertainment_articles', 'business_articles', 'automotive_articles', 'entertainment_featured_articles', 'business_featured_articles', 'automotive_featured_articles'));
    }
    public function category(Category $category){
        $categories = Category::all();
        $bannerAds = BannerAds::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        ->get();
        return view('front.category', compact('category', 'categories', 'bannerAds'));
    }
    public function author(Author $author){
        $authors = Author::all();
        $categories = Category::all();
        $bannerAds = BannerAds::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        ->get();
        return view('front.author', compact('author', 'authors', 'categories','bannerAds'));
        
    }
}
