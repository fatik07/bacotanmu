<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'curhat_id' => 'nullable|exists:curhats,id',
            "isi" => "required|string|min:5",
            "tanggal_komentar" => "nullable|date",
        ]);

        $uniqueName = $this->generateUniqueName($request->route('id'));

        Comment::create([
            'curhat_id' => $request->route('id'),
            "isi" => $request->isi,
            "ghost_name" => $uniqueName,
            "tanggal_komentar" => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        return redirect()->route('curhat-detail.show', $request->route('id'))->with('success', 'Balasanmu telah tersampikan ^_^');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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

    public function generateUniqueName($curhatId)
    {
        $words_1 = [
            "Kucing",
            "Anjing",
            "Kelinci",
            "Gajah",
            "Harimau",
            "Singa",
            "Beruang",
            "Zebra",
            "Kuda",
            "Domba",
            "Kambing",
            "Kuda Nil",
            "Kucing Hutan",
            "Ayam",
            "Bebek",
            "Burung",
            "Ikan",
            "Cicak",
            "Ular",
            "Tikus",
            "Kera",
            "Panda",
            "Sisi",
            "Bison",
            "Kanguru",
            "Koala",
            "Kuda Laut",
            "Penguin",
            "Turtle",
            "Cheetah",
            "Kadal",
            "Elang",
            "Nuri",
            "Merpati",
            "Ulat",
            "Belalang",
            "Jangkrik",
            "Paus",
            "Hiu",
            "Kepiting",
            "Lumba-Lumba",
            "Kupu-Kupu",
            "Serangga",
            "Panda Merah",
            "Marmut",
            "Simpanse",
            "Tupai",
            "Babi",
            "Ikan Salmon",
            "Ikan Tuna",
            "Cicak Gecko",
            "Kucing Persia",
            "Kucing Anggora",
            "Kucing Siam",
            "Anjing Dachshund",
            "Anjing Golden Retriever",
            "Anjing Beagle",
            "Anjing Bulldog",
            "Burung Hantu",
            "Burung Kenari",
            "Burung Kakak Tua",
            "Burung Cendrawasih",
            "Buaya",
            "Kura-Kura",
            "Banteng",
            "Badak",
            "Duri",
            "Bunglon",
            "Hedgehog",
            "Bubut",
            "Kuda Zebra",
            "Ikan Mas",
            "Ikan Guppy",
            "Ikan Koi",
            "Monyet",
            "Penyu",
            "Burung Merpati",
            "Elang Laut",
            "Pika",
            "Kijang",
            "Bubut",
            "Bison",
            "Kambing Gunung",
            "Turtle",
            "Macan",
            "Cheetah",
            "Tarantula",
            "Kucing Siam",
            "Kucing Birman",
            "Ikan Betta",
            "Anemone",
            "Anglerfish",
            "Lionfish",
            "Moray Eel",
        ];
        $words_2 = [
            "Berlari",
            "Melompat",
            "Mendaki",
            "Berenang",
            "Terbang",
            "Menggali",
            "Mengendus",
            "Memanjat",
            "Menyelam",
            "Berkicau",
            "Mengejar",
            "Bermain",
            "Makan",
            "Tidur",
            "Bergerak",
            "Bersembunyi",
            "Mengintai",
            "Memburu",
            "Bertengkar",
            "Bersantai",
            "Berkeliling",
            "Menyusup",
            "Menangkap",
            "Menari",
            "Menyanyi",
            "Menggigit",
            "Menjaga",
            "Membawa",
            "Menyambut",
            "Mengamati",
            "Merayap",
            "Menggoda",
            "Menggoda",
            "Menggigit",
            "Mengemudikan",
            "Mendorong",
            "Menyapu",
            "Mencari",
            "Mengelilingi",
            "Membalas",
            "Mengambil",
            "Mengatur",
            "Menyekat",
            "Melewati",
            "Menjelajahi",
            "Menyesuaikan",
            "Mengatur",
            "Menemukan",
            "Menghapus",
            "Menjauh",
            "Membangun",
        ];

        $wordsCount = count($words_1) + count($words_2);

        $defaultName = 'Kacang Tanah';

        $totalUsedNames = Comment::where('curhat_id', $curhatId)->distinct('ghost_name')->count('ghost_name');

        if ($totalUsedNames >= $wordsCount) {
            return $defaultName;
        }

        $attempts = 0;

        do {
            $fakeName = $words_1[rand(0, count($words_1) - 1)] . " " . $words_2[rand(0, count($words_2) - 1)];

            $exists = Comment::where('curhat_id', $curhatId)
                ->where('ghost_name', $fakeName)
                ->exists();

            $attempts++;

        } while ($exists);

        return $fakeName;
    }
}
