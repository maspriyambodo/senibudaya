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

        $query = OurCollection::select('dta_our_collections.*')->where('status', 1)->where('id_category', $categories_our_collection->id);

        if ($request->has('search')) {
            $search = $request->search;
            $filter = $request->filter;

            switch ($filter) {
                case 'Pencipta':
                    $query->where('pencipta', 'like', "%$search%");
                    break;
                case 'Kota/Kab':
                    $query->join('mt_kabupaten', 'dta_our_collections.kd_kabkota', '=', 'mt_kabupaten.id_kabupaten')
                          ->where('mt_kabupaten.nama', 'like', "%$search%");
                    break;
                case 'Provinsi':
                    $query->join('mt_provinsi', 'dta_our_collections.kd_prov', '=', 'mt_provinsi.id_provinsi')
                          ->where('mt_provinsi.nama', 'like', "%$search%");
                    break;
                case 'Tahun':
                    $query->whereYear('dta_our_collections.created_at', $search);
                    break;
                default:
                    $query->where('dta_our_collections.nama', 'like', "%$search%");
            }
        }

        $our_collections = $query->paginate(12);

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
