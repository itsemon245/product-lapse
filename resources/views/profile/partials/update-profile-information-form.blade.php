<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('profile.profile.info') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('profile.profile.description') }}
        </p>
    </header>
    <form action="{{ route('profile.update', auth()->id()) }}" method="POST" enctype="multipart/form-data"
        class="mt-6 space-y-6">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-md-4 justify-self-center">
                <div class="row justify-content-center align-items-center gap-2">
                    <label class="col-sm-12" style="max-width: 320px" for="imagefile">
                        <input
                            class="form-control
                        @error('profile_img')
                        is-invalid
                        @enderror"
                            type="file" id="imagefile" name="avatar" hidden>
                        <div class="relative">
                            <img loading="lazy" class="rounded-circle border border-primary"
                                style="height: 18rem; width:18rem;" class="border border-5 border-primary"
                                id="liveImage" src="{{ $user->image->url ?? avatar($user->name) }}"
                                alt="{{ auth()->user()->name }}">
                            <div class="d-flex justify-content-center">
                                <span
                                    style="
                                font-size: 24px;
                                margin-top:-40px;
                                "
                                    class="mdi mdi-image-edit text-primary absolute bottom-0"></span>
                            </div>
                        </div>
                        @error('avatar')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>
            </div>
            <div class="col-md-8 row">
                <div class="col-md-6">
                    <x-input-label for="name" :value="__('profile.profile.first_name')" />
                    <x-input placeholder="{{ __('profile.profile.namef') }}" id="name" name="first_name"
                        type="text" class="mt-1 block w-full" :value="old('first_name', $user->first_name)" required autocomplete="name" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="name" :value="__('profile.profile.last_name')" />
                    <x-input placeholder="{{ __('profile.profile.namef') }}" id="name" name="last_name"
                        type="text" class="mt-1 block w-full" :value="old('last_name', $user->last_name)" required autocomplete="name" />
                </div>
                <div class="col-md-6">
                    <x-input-label for="email" :value="__('profile.profile.email')" />
                    <x-input placeholder="{{ __('profile.profile.email') }}" id="email" name="email"
                        type="text" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="email" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <x-input-label for="phone" :value="__('profile.profile.phone')" />
                    <x-input placeholder="{{ __('profile.profile.phone') }}" id="phone" name="phone"
                        type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autocomplete="phone" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                </div>
                @if ($user->type != 'admin')
                    <div class="col-md-6">
                        <x-input-label for="workplace" :value="__('profile.profile.workplace')" />
                        <x-input placeholder="{{ __('profile.profile.workplace') }}" id="workplace" name="workplace"
                            type="text" class="mt-1 block w-full" :value="old('workplace', $user->workplace)" autocomplete="workplace" />
                        <x-input-error class="mt-2" :messages="$errors->get('workplace')" />
                    </div>
                @endif
                @if ($user->type == 'member')
                    <div class="col-md-6">
                        <x-input-label for="job_title" :value="__('Job Title')" />
                        <x-input placeholder="{{ __('Job Title') }}" id="job_title" name="job_title" type="text"
                            class="mt-1 block w-full" :value="old('job_title', $user->job_title)" autocomplete="job_title" />
                        <x-input-error class="mt-2" :messages="$errors->get('job_title')" />
                    </div>
                @endif
                <div class="col-12">
                    <div class="flex items-center gap-4">
                        <x-button>{{ __('profile.password.save') }}</x-button>

                        @if (session('status') === 'profile-updated')
                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </form>
</section>
