<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background: linear-gradient(45deg, #FF5733, #FFC300);">
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg sm:justify-center items-center border border-blue-500">
        <div class="flex items-center justify-center">
            <img class="logo-auth" width="150" height="150" src="{{ asset('logo.svg') }}" alt="Your SVG Image">
            </div>
            {{ $slot }}
        </div>
</div>
