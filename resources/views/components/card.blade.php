<div
    class="relative max-w-sm w-full min-h-[270px] p-6 bg-white border-2 border-black rounded-lg shadow-custom font-poppins hover:cursor-pointer group">
    <div class="hover-effect w-full">
        <div class="relative inline-block">
            <h5 class="mb-2 text-md font-semibold tracking-tight text-gray-700 underline-custom">Bacotanmu</h5>
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-arrow-up-right absolute right-0 top-0 h-7 w-7 translate-y-[-5px] translate-x-2 opacity-0 transition-all duration-300 group-hover:-translate-y-2 group-hover:opacity-100 text-gray-500">
            <path d="M7 7h10v10"></path>
            <path d="M7 17 17 7"></path>
        </svg>

        <p class="mb-3 font-normal text-sm text-gray-900">{{ Str::limit($curhat->isi, 250, ' .....') }}</p>
    </div>

    <div class="absolute bottom-9 left-0 right-0 flex justify-between px-6 text-sm text-gray-500">
        <p>dari: anonymous</p>
        <p>{{ \Carbon\Carbon::parse($curhat->tanggal_posting)->diffForHumans() }}</p>
    </div>

    <div class="absolute bottom-3 left-0 right-0 px-6">
        <span
            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Default</span>
        <span
            class="bg-pink-100 text-pink-800 text-xs font-medium px-2.5 py-0.5 rounded dark:bg-pink-900 dark:text-pink-300">Pink</span>
    </div>
</div>

<style>
    .underline-custom::after {
        content: '';
        position: absolute;
        right: 0;
        bottom: 8px;
        width: 50%;
        height: 2px;
        background-color: black;
        transform: rotate(-5deg);
        transform-origin: left;
    }

    .hover-effect {
        position: relative;
        display: inline-block;
        transition: transform 0.3s ease;
    }

    .group:hover .hover-effect {
        transform: translateY(-3px);
    }

    .lucide-arrow-up-right {
        right: 0;
        top: 0;
    }
</style>