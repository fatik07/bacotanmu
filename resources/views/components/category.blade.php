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

        @forelse ($categories as $category)
        <x-button data-category-id="{{ $category->id }}"
            color="category-button bg-white text-black hover:bg-gray-300 font-comfortaa flex justify-center items-center px-3 py-1 text-sm">
            {{ $category->name }}
        </x-button>
        @empty
        <x-button
            color="category-button bg-white text-black hover:bg-gray-300 font-comfortaa flex justify-center items-center px-3 py-1 text-sm">
            tidak ada kategori
        </x-button>
        @endforelse
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
        let activeCategory = null;
        
        function checkScrollPosition() {
            const maxScrollLeft = container.scrollWidth - container.clientWidth;
            if (container.scrollWidth <= container.clientWidth) {
                container.classList.add('no-fade');
            } else {
                container.classList.remove('no-fade');
            }
            scrollLeftButton.style.opacity = container.scrollLeft === 0 ? '0.5' : '1';
            scrollLeftButton.style.pointerEvents = container.scrollLeft === 0 ? 'none' : 'auto';
            scrollRightButton.style.opacity = container.scrollLeft >= maxScrollLeft ? '0.5' : '1';
            scrollRightButton.style.pointerEvents = container.scrollLeft >= maxScrollLeft ? 'none' : 'auto';
        }

        // Fungsi untuk mengatur kategori aktif
        function setActiveCategory(button) {
            if (activeCategory === button) {
                activeCategory.classList.remove('active');
                activeCategory = null;
            } else {
                categoryButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                activeCategory = button;
            }
        }

        // Event listener untuk setiap tombol kategori
        categoryButtons.forEach(button => {
            button.addEventListener('click', function () {
                const categoryId = activeCategory === button ? null : this.getAttribute('data-category-id');
                setActiveCategory(button);

                document.getElementById('curhat-container').innerHTML = '<p>Loading...</p>';
                fetch(`/filter-curhats`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ category_id: categoryId })
                })
                .then(response => response.json())
                .then(data => {                    
                    document.getElementById('curhat-container').innerHTML = data.html;
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('curhat-container').innerHTML = '<p>Error loading curhats.</p>';
                });
            });
        });

        // Scroll horizontal ke kiri
        scrollLeftButton.addEventListener('click', function() {
            container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        });

        // Scroll horizontal ke kanan
        scrollRightButton.addEventListener('click', function() {
            container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        });

        // Event listener untuk scroll container
        container.addEventListener('scroll', checkScrollPosition);
        checkScrollPosition();
        window.addEventListener('resize', checkScrollPosition);
    });
</script>