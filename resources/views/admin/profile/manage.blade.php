<x-admin-layout>
    <x-slot name="header">
        <x-admin.page-header :title="__('Profile')"/>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h2 class="h4">
                {{ __('Profile Information') }}
            </h2>
            <div class="mt-4 col-6">
                @include('admin.profile.partials.update-profile-information-form')
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h2 class="h4">
                {{ __('Profile Image') }}
            </h2>
            <div class="mt-4 col-6">
                @include('admin.profile.partials.update-profile-image-form')
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h2 class="h4">
                {{ __('Update Password') }}
            </h2>
            <div class="mt-4 col-6">
                @include('admin.profile.partials.update-password-form')
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            <h2 class="h4">
                {{ __('Delete Account') }}
            </h2>
            <div class="mt-4 col-6">
                @include('admin.profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-admin-layout>


