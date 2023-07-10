<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="">
        @csrf
        @method('patch')
        <div>
            <x-admin.input-label for="name" :value="__('Name')"/>
            <x-admin.text-input id="name" name="name" type="text" class="mt-1 d-block"
                                :value="old('name', $user->name)"
                                autofocus autocomplete="name"/>
            <x-admin.input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>
        <div class="mt-3">
            <x-admin.input-label for="username" :value="__('Username')"/>
            <x-admin.text-input id="username" name="username" type="text" class="mt-1 d-block"
                                :value="old('username', $user->username)"
                                autofocus autocomplete="username"/>
            <x-admin.input-error class="mt-2" :messages="$errors->get('username')"/>
        </div>
        <div class="mt-3">
            <x-admin.input-label for="email" :value="__('Email')"/>
            <x-admin.text-input id="email" name="email" type="email" class="mt-1 d-block"
                                :value="old('email', $user->email)" autocomplete="email"/>
            <x-admin.input-error class="mt-2" :messages="$errors->get('email')"/>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                                class="btn btn-sm btn-primary">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-start mt-3 align-items-center">
            <x-admin.submit-button class="btn-dark">
                {{ __('Save') }}
            </x-admin.submit-button>
            @if (session('status') === 'profile-updated')
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
