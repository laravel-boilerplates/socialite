<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>


        <div class="mb-4">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Social Login Privacy Policy</h3>
            <p class="mt-1 text-sm text-gray-500">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non ipsum bibendum, sollicitudin risus vitae, fermentum massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi
                purus enim, ultricies pharetra lorem a, pretium feugiat ex. Nulla nec lacus nec diam ultricies ultrices. Proin pharetra metus et leo iaculis, in lacinia lorem maximus. Nunc tempor faucibus tellus nec pellentesque. Etiam a
                erat quis libero tempus sagittis non scelerisque justo. Maecenas libero lectus, gravida sit amet interdum ac.
            </p>
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <x-socialite-register-buttons />

    </x-auth-card>
</x-guest-layout>
