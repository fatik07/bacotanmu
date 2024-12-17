<div class="relative w-full md:w-3/4 lg:w-1/2">
    <div class="bg-white border-2 border-black rounded-md shadow-sm w-full h-full bg-card flex flex-col">
        <div class="p-2">
            <span class="text-sm text-gray-500">{{ $comment->ghost_name ?? 'Darah Merah' }} - {{
                \Carbon\Carbon::parse($comment->tanggal_komentar)->diffForHumans() }} </span>
        </div>
        <div class="p-2">
            <p class="text-sm font-poppins text-gray-600">{{ $comment->isi }}</p>
        </div>
    </div>
</div>