<div class="relative flex justify-between items-center">

    <x-button id="scroll-left"
        color="bg-white text-black hover:bg-gray-300 font-comfortaa flex justify-center items-center px-3 py-1 text-sm z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide h-4 w-4 rotate-[225deg] transition-all duration-300 text-gray-900">
            <path d="M7 7h10v10"></path>
            <path d="M7 17 17 7"></path>
        </svg>
    </x-button>

    <div class="flex gap-3 overflow-x-auto hide-scrollbar transition-opacity duration-300 relative mask-fade"
        id="category-container">
        <x-button
            color="category-button bg-white text-black hover:bg-gray-300 font-comfortaa flex justify-center items-center px-3 py-1 text-sm">
            Kategori 1
        </x-button>
        <x-button
            color="category-button bg-white text-black hover:bg-gray-300 font-comfortaa flex justify-center items-center px-3 py-1 text-sm">
            Kategori 2
        </x-button>
        <x-button
            color="category-button bg-white text-black hover:bg-gray-300 font-comfortaa flex justify-center items-center px-3 py-1 text-sm">
            Kategori 3
        </x-button>
        <x-button
            color="category-button bg-white text-black hover:bg-gray-300 font-comfortaa flex justify-center items-center px-3 py-1 text-sm">
            Kategori 3
        </x-button>
        <x-button
            color="category-button bg-white text-black hover:bg-gray-300 font-comfortaa flex justify-center items-center px-3 py-1 text-sm">
            Kategori 3
        </x-button>
        <x-button
            color="category-button bg-white text-black hover:bg-gray-300 font-comfortaa flex justify-center items-center px-3 py-1 text-sm">
            Kategori 3
        </x-button>
        <x-button
            color="category-button bg-white text-black hover:bg-gray-300 font-comfortaa flex justify-center items-center px-3 py-1 text-sm">
            Kategori 3
        </x-button>
        <x-button
            color="category-button bg-white text-black hover:bg-gray-300 font-comfortaa flex justify-center items-center px-3 py-1 text-sm">
            Kategori 3
        </x-button>
        <x-button
            color="category-button bg-white text-black hover:bg-gray-300 font-comfortaa flex justify-center items-center px-3 py-1 text-sm">
            Kategori 3
        </x-button>

    </div>

    <x-button id="scroll-right"
        color="bg-gray-700 text-white hover:bg-gray-900 font-comfortaa flex justify-center items-center px-3 py-1 text-sm z-10">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide h-4 w-4 rotate-[45deg] transition-all duration-300 text-white">
            <path d="M7 7h10v10"></path>
            <path d="M7 17 17 7"></path>
        </svg>
    </x-button>

</div>


<style>
    /* Hilangkan scrollbar yang muncul */
    .hide-scrollbar::-webkit-scrollbar {
        display: none;
    }

    .hide-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    #category-container {
        scroll-behavior: smooth;
        white-space: nowrap;
        max-width: calc(100% - 40px);
        padding: 10px;
        overflow-x: auto;
        /* mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent); */
        padding-left: 20px;
        padding-right: 20px;
        z-index: 1;
    }

    .mask-fade {
        mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
    }

    .no-fade {
        mask-image: none;
    }

    #scroll-left,
    #scroll-right {
        z-index: 10;
        position: relative;
    }

    .category-button.active {
        background-color: #FFC124;
        color: black;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('category-container');
        const scrollLeftButton = document.getElementById('scroll-left');
        const scrollRightButton = document.getElementById('scroll-right');
        const scrollAmount = 200;

        const categoryButtons = document.querySelectorAll('.category-button');
        
        function checkScrollPosition() {
            const maxScrollLeft = container.scrollWidth - container.clientWidth;
           
            if (container.scrollWidth <= container.clientWidth) {
                container.classList.add('no-fade');
            } else {
                container.classList.remove('no-fade');
            }

            // Kontrol tombol panah kiri
            if (container.scrollLeft === 0) {
                scrollLeftButton.style.opacity = '0.5';
                scrollLeftButton.style.pointerEvents = 'none';
            } else {
                scrollLeftButton.style.opacity = '1';
                scrollLeftButton.style.pointerEvents = 'auto';
            }

            // Kontrol tombol panah kanan
            if (container.scrollLeft >= maxScrollLeft) {
                scrollRightButton.style.opacity = '0.5';
                scrollRightButton.style.pointerEvents = 'none';
            } else {
                scrollRightButton.style.opacity = '1';
                scrollRightButton.style.pointerEvents = 'auto';
            }
        }
    
        function setActiveCategory(button) {
            categoryButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        }
        
        categoryButtons.forEach(button => {
            button.addEventListener('click', function () {
                setActiveCategory(button);
            });
        });

        scrollLeftButton.addEventListener('click', function() {
            container.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
            setTimeout(checkScrollPosition, 300);
        });

        scrollRightButton.addEventListener('click', function() {
            container.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
            setTimeout(checkScrollPosition, 300);
        });

        container.addEventListener('scroll', checkScrollPosition);    
        checkScrollPosition(); 
        window.addEventListener('resize', checkScrollPosition);
    });
</script>