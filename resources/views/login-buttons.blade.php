<div class="mt-6">
    <div class="relative">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-gray-300"></div>
        </div>
        <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-white text-gray-500">
                Or continue with
            </span>
        </div>
    </div>

    <div class="mt-6 grid grid-cols-3 gap-3">
        @foreach ($providers as $provider)
            <div>
                <a href="{{ route('social.login', $provider) }}" class="w-full inline-flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                    <span class="sr-only">Sign in with {{ $provider }}</span>
                    {{ svg('fab-' . $provider, 'w-5 h-5') }}
                </a>
            </div>
        @endforeach
    </div>
</div>
