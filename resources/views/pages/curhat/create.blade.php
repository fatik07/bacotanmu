@extends('layouts.main')

@section('content')
<form action="{{ route('curhat-baru.create') }}" method="POST">
    @csrf

    <div class="flex justify-start items-center w-full md:w-3/4 lg:w-1/2 m-auto mt-10 gap-1" id="category-wrapper">
        <button id="add-category-button" type="button"
            class="py-1 px-4 inline-flex items-center gap-x-2 text-xs font-medium rounded-md border border-gray-400 bg-white text-black hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-slide-up-animation-modal"
            data-hs-overlay="#hs-slide-up-animation-modal">
            tambah kategori
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-plus">
                <path d="M5 12h14" />
                <path d="M12 5v14" />
            </svg>
        </button>
    </div>

    <div class="flex flex-col justify-center items-center mt-2">
        <x-textarea name="isi"></x-textarea>
    </div>

    <div class="py-8 flex justify-center items-center">
        <x-button-submit url="/curhat-baru" color="bg-secondary-700 text-white hover:bg-secondary-500 font-comfortaa">
            Kirim
            Sekarang</x-button-submit>
    </div>
</form>

<div id="hs-slide-up-animation-modal"
    class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto pointer-events-none"
    role="dialog" tabindex="-1" aria-labelledby="hs-slide-up-animation-modal-label">
    <div
        class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-14 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b">
                <h3 id="hs-slide-up-animation-modal-label" class="font-bold text-gray-800">
                    Cari Kategori
                </h3>
                <button type="button" id="close-svg"
                    class="hs-dropup-toggle size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none"
                    aria-label="Close" data-hs-overlay="#hs-slide-up-animation-modal">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                <div id="categories-list">
                    <div class="category-item py-2 px-4 inline-flex items-center gap-x-2 text-xs font-medium rounded-2xl border border-gray-400 bg-white text-black focus:outline-none focus:bg-gray-100 disabled:opacity-50 hover:cursor-pointer"
                        data-category="kerja">
                        kerja
                    </div>
                    <div class="category-item py-2 px-4 inline-flex items-center gap-x-2 text-xs font-medium rounded-2xl border border-gray-400 bg-white text-black focus:outline-none focus:bg-gray-100 disabled:opacity-50 hover:cursor-pointer"
                        data-category="hiburan">
                        hiburan
                    </div>
                    <div class="category-item py-2 px-4 inline-flex items-center gap-x-2 text-xs font-medium rounded-2xl border border-gray-400 bg-white text-black focus:outline-none focus:bg-gray-100 disabled:opacity-50 hover:cursor-pointer"
                        data-category="hidup liku liku">
                        hidup liku liku
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const categoryWrapper = document.getElementById('category-wrapper');
        const addCategoryButton = document.getElementById('add-category-button');    
        const categoriesList = document.getElementById('categories-list');
        const modal = document.getElementById('hs-slide-up-animation-modal');
        let selectedCategories = [];
                
        function updateSelectedCategories() {        
            categoryWrapper.innerHTML = '';
                        
            selectedCategories.forEach(category => {
                const categoryButton = document.createElement('button');
                categoryButton.setAttribute('id', `category-${category}`);
                categoryButton.type = 'button';
                categoryButton.classList.add('py-1', 'px-4', 'inline-flex', 'items-center', 'text-xs', 'font-medium', 'rounded-md', 'border', 'border-gray-400', 'bg-tertiary', 'text-black');
                categoryButton.innerHTML = `${category} <svg xmlns="http://www.w3.org/2000/svg" class="cursor-pointer remove-category" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M18 6 6 18"></path>
                        <path d="M6 6l12 12"></path>
                    </svg>`;
                categoryButton.setAttribute('aria-haspopup', 'dialog');
                categoryButton.setAttribute('aria-expanded', 'false');
                categoryButton.setAttribute('aria-controls', 'hs-slide-up-animation-modal');
                categoryButton.setAttribute('data-hs-overlay', '#hs-slide-up-animation-modal');

                categoryWrapper.appendChild(categoryButton);

                categoryButton.querySelector('.remove-category').addEventListener('click', () => {
                    selectedCategories = selectedCategories.filter(c => c !== category);
                    updateSelectedCategories();
                    updateModalCategories();
                });

                categoryButton.addEventListener('click', (e) => {
                    if (!e.target.closest('.remove-category')) {                             
                        const backdrop = document.createElement('div');
                        backdrop.id = 'hs-slide-up-animation-modal-backdrop';
                        backdrop.style = 'z-index: 79';
                        backdrop.classList.add('hs-overlay-backdrop', 'transition', 'duration','fixed', 'inset-0', 'bg-gray-900', 'bg-opacity-50', 'dark:bg-opacity-80', 'dark:bg-neutral-900');
                        document.body.appendChild(backdrop);

                        document.body.classList.add('overflow-hidden');

                        categoryButton.setAttribute('aria-expanded', 'true');

                        modal.classList.remove('hidden'); 
                        modal.classList.add('open'); 
                        modal.classList.add('opened'); 
                        modal.setAttribute('aria-overlay', 'true');
                        modal.setAttribute('tabindex', '-1');

                        updateModalCategories();

                        backdrop.addEventListener('click', closeModalAndUpdateCategories);
                        
                        document.getElementById('close-svg').addEventListener('click', closeModalAndUpdateCategories);
                    }
                });
            });

            // Add category button akan hilang jika ada kategori yang dipilih
            if (selectedCategories.length === 0) {
                categoryWrapper.appendChild(addCategoryButton);
            }
        }

        function updateModalCategories() {
            const categoryItems = categoriesList.querySelectorAll('.category-item');
            categoryItems.forEach(item => {
                const category = item.getAttribute('data-category');
                if (selectedCategories.includes(category)) {
                    item.classList.add('bg-tertiary', 'text-black');
                    item.classList.remove('bg-white', 'text-black');
                } else {
                    item.classList.remove('bg-tertiary', 'text-black');
                    item.classList.add('bg-white', 'text-black');
                }
            });
        }

        function closeModalAndUpdateCategories() {
            modal.classList.add('hidden'); 
            modal.classList.remove('open'); 
            modal.classList.remove('opened'); 
            modal.setAttribute('aria-overlay', 'false');
            document.body.classList.remove('overflow-hidden');
            document.getElementById('hs-slide-up-animation-modal-backdrop').remove(); 
            updateSelectedCategories();
        }
        
        categoriesList.addEventListener('click', (e) => {
            if (e.target.classList.contains('category-item')) {
                const category = e.target.getAttribute('data-category');
                                
                if (selectedCategories.includes(category)) {
                    // Hapus dari array kategori terpilih jika sudah ada
                    selectedCategories = selectedCategories.filter(c => c !== category);
                    e.target.classList.remove('bg-tertiary', 'text-black');
                    e.target.classList.add('bg-white', 'text-black');
                } else {
                    // Tambahkan ke kategori terpilih
                    selectedCategories.push(category);
                    e.target.classList.add('bg-tertiary', 'text-black');
                    e.target.classList.remove('bg-white', 'text-black');
                }
            }
        });

        // Event listener untuk klik di luar modal
        window.addEventListener('click', function (event) {            
            if (event.target === document.getElementById('hs-slide-up-animation-modal-backdrop') || event.target === document.getElementById('close-svg')) {
                updateSelectedCategories();          
            }
        });
    });
</script>