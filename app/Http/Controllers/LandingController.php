<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesOurCollection;
use App\Models\OurCollection;

class LandingController extends Controller
{
    public function index()
    {
        $categories_our_collection = CategoriesOurCollection::where('status', 1)->orderBy('urutan')->get();

        return view('landing.pages.home', compact('categories_our_collection'));
    }

    public function show_collections(Request $request, $slug)
    {
        $categories_our_collection = CategoriesOurCollection::where('status', 1)->where('slug', $slug)->firstOrFail();

        $query = OurCollection::where('status', 1)->where('id_category', $categories_our_collection->id);

        if ($request->has('search')) {
            $search = $request->search;
            $filter = $request->filter;

            switch ($filter) {
                case 'Pencipta':
                    $query->where('pencipta', 'like', "%$search%");
                    break;
                case 'Kota/Kab':
                    $query->where('kd_kabkota', 'like', "%$search%");
                    break;
                case 'Provinsi':
                    $query->where('kd_prov', 'like', "%$search%");
                    break;
                case 'Tahun':
                    $query->whereYear('created_at', $search);
                    break;
                default:
                    $query->where('nama', 'like', "%$search%");
            }
        }

        $our_collections = $query->paginate(12);

        return view('landing.pages.our-collections.lists', compact('our_collections', 'categories_our_collection'));
    }

    public function show_collection_detail($slug)
    {
        $our_collection = OurCollection::where('slug', $slug)->firstOrFail();
        $category = CategoriesOurCollection::findOrFail($our_collection->id_category);
        $random_collections = OurCollection::where('id', '!=', $our_collection->id)
                                           ->inRandomOrder()
                                           ->take(4)
                                           ->get();

        return view('landing.pages.our-collections.show-detail', compact('our_collection', 'category', 'random_collections'));
    }
}
