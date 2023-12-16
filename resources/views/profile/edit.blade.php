<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="fadeIn py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                @if(auth('admin')->user())
                    @include('profile.partials.admin-update-profile-information-form')
                @else
                    @include('profile.partials.update-profile-information-form')
                @endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                @if(auth('admin')->user())
                    @include('profile.partials.admin-update-password-form')
                @else
                    @include('profile.partials.update-password-form')
                @endif
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                @if(auth('admin')->user())
                    @include('profile.partials.delete-admin-form')
                @else
                    @include('profile.partials.delete-user-form')
                @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
