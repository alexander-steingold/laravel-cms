<section>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-admin.input-label for="current_password" :value="__('Current Password')"/>
            <x-admin.text-input id="current_password" name="current_password" type="password"
                                class="mt-1 d-block"
                                autocomplete="current-password"/>
            <x-admin.input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2"/>
        </div>

        <div class="mt-3">
            <x-admin.input-label for="password" :value="__('New Password')"/>
            <x-admin.text-input id="password" name="password" type="password" class="mt-1 d-block"
                                autocomplete="new-password"/>
            <x-admin.input-error :messages="$errors->updatePassword->get('password')" class="mt-2"/>
        </div>

        <div class="mt-3">
            <x-admin.input-label for="password_confirmation" :value="__('Confirm Password')"/>
            <x-admin.text-input id="password_confirmation" name="password_confirmation" type="password"
                                class="mt-1 d-block" autocomplete="new-password"/>
            <x-admin.input-error :messages="$errors->updatePassword->get('password_confirmation')"
                                 class="mt-2 text-danger"/>
        </div>

        <div class="d-flex justify-content-start mt-3 align-items-center">
            <x-admin.submit-button class="btn-dark">
                {{ __('Save') }}
            </x-admin.submit-button>

            @if (session('status') === 'password-updated')
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
