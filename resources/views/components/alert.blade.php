@if(session('success'))
<div style="position: fixed; top: 10px; right: 24px; z-index: 999998">
    <div {!! $attributes->merge(['class' => "relative shake bg-sky-600 text-white p-3 rounded-md shadow-lg flex flex-row
        items-center", 'id' => 'toast-warning']) !!}>
        <div {!! $attributes->merge(['class' => 'flex flex-1 flex-col ml-2']) !!}>
            <div>{{ session('success') }}</div>
        </div>
    </div>
</div>
@endif

<style>
    .hide {
        display: none !important;
    }

    .shake {
        animation: shake 0.5s;
    }

    @keyframes shake {
        0% {
            transform: translateX(0);
        }

        25% {
            transform: translateX(-5px);
        }

        50% {
            transform: translateX(5px);
        }

        75% {
            transform: translateX(-5px);
        }

        100% {
            transform: translateX(0);
        }
    }
</style>

<script>
    setTimeout(() => {
        document.getElementById('toast-warning').classList.add('hide');
    }, 4000);
</script>