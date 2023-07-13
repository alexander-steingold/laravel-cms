<section>

    <form method="post" action="{{ route('home_intro.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <x-admin.input-label for="title" :value="__('Title')"/>
            <x-admin.text-input id="title" name="title" type="text" class="mt-1 d-block"
                                :value="old('title', $data->title)"
                                autofocus autocomplete="title"/>
            <x-admin.input-error class="mt-2" :messages="$errors->get('title')"/>
        </div>

        <div class="mt-3">
            <x-admin.input-label for="description" :value="__('Description')"/>
            {{--            <x-admin.text-area id="description" name="description" class="mt-1 d-block"--}}
            {{--                               :value="old('description', $data->description)"--}}
            {{--            ></x-admin.text-area>--}}

            <textarea id="elm1" name="description">{{old('description', $data->description)}}</textarea>

            <x-admin.input-error class="mt-2" :messages="$errors->get('description')"/>
        </div>

        <div class="mt-3">
            <x-admin.input-label for="video" :value="__('Video Url')"/>

            <x-admin.text-input id="video" name="video" type="text" class="mt-1 d-block"
                                :value="old('video', $data->video)"
                                autofocus autocomplete="video"/>
            <x-admin.input-error class="mt-2" :messages="$errors->get('video')"/>
        </div>

        <div class="mt-3">
            <x-admin.input-label for="image" :value="__('Image')"/>
            @if($data->image)
                <img class="img-thumbnail" src="{{asset(env('HOMEPAGE_INTRO_BANNER_PATH').$data->image)}}">
            @endif
            <x-admin.text-input id="image" name="image" type="file" class="mt-1 d-block"
                                autofocus autocomplete="image"/>
            <x-admin.input-error class="mt-2" :messages="$errors->get('image')"/>
        </div>

        <div class="d-flex justify-content-start mt-3 align-items-center">
            <x-admin.submit-button class="btn-dark">
                {{ __('Save') }}
            </x-admin.submit-button>
            @if (session('status') === 'info-updated')
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
