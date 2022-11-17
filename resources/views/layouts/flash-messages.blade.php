<div class="max-w-7xl mx-auto mt-8 -mb-8">
    @if ($message = Session::get('success'))
        <div class="bg-green-100 drop-shadow-md rounded-lg py-5 px-6 mb-4 text-base text-green-700 mb-3" role="alert">
            {{ $message }}
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="bg-red-100 drop-shadow-md rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3" role="alert">
            {{ $message }}
        </div>
    @endif


    @if ($message = Session::get('warning'))
        <div class="bg-yellow-100 drop-shadow-md rounded-lg py-5 px-6 mb-4 text-base text-yellow-700 mb-3" role="alert">
            {{ $message }}
        </div>
    @endif


    @if ($message = Session::get('info'))
        <div class="bg-blue-100 drop-shadow-md rounded-lg py-5 px-6 mb-4 text-base text-blue-700 mb-3" role="alert">
            {{ $message }}
        </div>
    @endif
</div>
