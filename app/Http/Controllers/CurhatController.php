<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Curhat;
use App\Models\CurhatCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CurhatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $curhats = Curhat::with('categories')->latest()->paginate(3);
        return view('welcome', compact('curhats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.curhat.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "isi" => "required|string|min:20",
            "tanggal_posting" => "nullable|date",
            "jumlah_like" => "nullable|integer",
            "jumlah_komentar" => "nullable|integer",
            'category_id' => 'required|exists:categories,id|array|min:1|max:4',
            'curhat_id' => 'nullable|exists:curhats,id',
        ], [
            'category_id' => 'The cateogry field is required.',
            'category_id.max' => 'You can only select up to 4 categories.',
        ]);

        $curhat = Curhat::create([
            "isi" => $request->isi,
            "tanggal_posting" => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        foreach ($request->category_id as $categoryId) {
            CurhatCategory::create([
                'curhat_id' => $curhat->id,
                'category_id' => $categoryId,
            ]);
        }

        return redirect()->route('curhat.index')->with('success', 'Bacotanmu telah tersampikan ^_^');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $curhat = Curhat::find($id);
        $categories = Category::all();
        // $curhat = Curhat::with('categories')->findOrFail($id);

        return view('pages.curhat.detail', compact('curhat', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showAll()
    {
        $curhats = Curhat::with('categories')->latest()->take(6)->get();
        $categories = Category::all();
        return view('pages.curhat.list-all', compact('curhats', 'categories'));
    }

    public function loadMore(Request $request)
    {
        $skip = intval($request->input('skip', 0));

        $curhats = Curhat::latest()->skip($skip)->take(6)->get();

        $showMoreButton = Curhat::count() > ($skip + 6);

        $categories = Category::all();

        $cardsHtml = '';
        foreach ($curhats as $curhat) {
            $cardsHtml .= view('components.card', ['curhat' => $curhat, 'categories' => $categories])->render();
        }

        return response()->json([
            'curhats' => $cardsHtml,
            'showMoreButton' => $showMoreButton,
        ]);
    }
}
