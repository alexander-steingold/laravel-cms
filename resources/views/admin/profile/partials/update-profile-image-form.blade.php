<section>
    <form method="post" action="{{ route('profile.upload') }}" enctype="multipart/form-data">
        @csrf
        <div>
            <x-admin.input-label for="image" :value="__('Profile Avatar')"/>
            <img class="rounded-circle avatar-md" src="{{asset(env('USER_AVATAR_PATH').$user->avatar)}}">
            <x-admin.text-input id="image" name="image" type="file" class="mt-1 d-block"
                                autofocus autocomplete="image"/>
            <x-admin.input-error class="mt-2" :messages="$errors->get('image')"/>
        </div>

        <div class="d-flex justify-content-start mt-3 align-items-center">
            <x-admin.submit-button class="btn-dark">
                {{ __('Save') }}
            </x-admin.submit-button>
            @if (session('status') === 'avatar-updated')
                <span
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-muted mx-2"
                >{{ __('Saved.') }}</span>
            @endif

        </div>


    </form>
</section>
