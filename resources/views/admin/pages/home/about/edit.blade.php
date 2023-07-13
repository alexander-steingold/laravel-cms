<x-admin-layout>
    <x-slot name="header">
        <x-admin.page-header :title="__('Homepage')"/>
    </x-slot>

    <div class="card">
        <div class="card-body">
            <h2 class="h4">
                {{ __('About Section') }}
            </h2>
            <div class="mt-4 col-4">
                @include('admin.pages.home.about.partials.update-page-info-form')
            </div>
        </div>
    </div>
</x-admin-layout>

