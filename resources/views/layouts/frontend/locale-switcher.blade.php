<form id="locale-switch-form" class="h-6" action="{{ route('lang.toggle') }}" method="post">
    @csrf
    <label class="inline-flex rtl:flex-row-reverse items-center cursor-pointer gap-2 m-0" id="locale-switch">
        <span class="text-sm font-medium text-gray-900 dark:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                <mask id="circleFlagsUk0">
                    <circle cx="256" cy="256" r="256" fill="#fff" />
                </mask>
                <g mask="url(#circleFlagsUk0)">
                    <path fill="#eee"
                        d="m0 0l8 22l-8 23v23l32 54l-32 54v32l32 48l-32 48v32l32 54l-32 54v68l22-8l23 8h23l54-32l54 32h32l48-32l48 32h32l54-32l54 32h68l-8-22l8-23v-23l-32-54l32-54v-32l-32-48l32-48v-32l-32-54l32-54V0l-22 8l-23-8h-23l-54 32l-54-32h-32l-48 32l-48-32h-32l-54 32L68 0z" />
                    <path fill="#0052b4"
                        d="M336 0v108L444 0Zm176 68L404 176h108zM0 176h108L0 68ZM68 0l108 108V0Zm108 512V404L68 512ZM0 444l108-108H0Zm512-108H404l108 108Zm-68 176L336 404v108z" />
                    <path fill="#d80027"
                        d="M0 0v45l131 131h45zm208 0v208H0v96h208v208h96V304h208v-96H304V0zm259 0L336 131v45L512 0zM176 336L0 512h45l131-131zm160 0l176 176v-45L381 336z" />
                </g>
            </svg>


        </span>
        <input type="checkbox"  name="toggle_locale" class="sr-only peer"
            @checked(app()->getLocale() == 'ar')>
        <div
            class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:end-5 rtl:after:start-6 rtl:peer-checked:after:end-0 peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
        </div>
        <span class="text-sm font-medium text-gray-900 dark:text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height=24" viewBox="0 0 512 512">
                <mask id="circleFlagsSa0">
                    <circle cx="256" cy="256" r="256" fill="#fff" />
                </mask>
                <g mask="url(#circleFlagsSa0)">
                    <path fill="#496e2d" d="M0 0h512v512H0z" />
                    <g fill="#eee">
                        <path
                            d="M144.7 306c0 18.5 15 33.5 33.4 33.5h100.2a27.8 27.8 0 0 0 27.8 27.8h33.4a27.8 27.8 0 0 0 27.8-27.8V306zm225.4-161.3v78c0 12.2-10 22.2-22.3 22.2v33.4c30.7 0 55.7-25 55.7-55.7v-77.9H370zm-239.3 78c0 12.2-10 22.2-22.3 22.2v33.4c30.7 0 55.7-25 55.7-55.7v-77.9h-33.4z" />
                        <path
                            d="M320 144.7h33.4v78H320zm-50 44.5a5.6 5.6 0 0 1-11.2 0v-44.5h-33.4v44.5a5.6 5.6 0 0 1-11.1 0v-44.5h-33.4v44.5a39 39 0 0 0 39 39a38.7 38.7 0 0 0 22.2-7a38.7 38.7 0 0 0 22.2 7c1.7 0 3.4-.1 5-.3a22.3 22.3 0 0 1-21.6 17v33.4c30.6 0 55.6-25 55.6-55.7v-77.9H270z" />
                        <path d="M180.9 244.9h50v33.4h-50z" />
                    </g>
                </g>
            </svg>
        </span>
    </label>
</form>

@push('scripts')
    <script>
        $(document).ready(function() {
            let form = $('#locale-switch-form')
            let toggle = $('#locale-switch')
            let input = toggle.find('input[name="toggle_locale"]')
            input.on('change', (e) => {
                form.submit()
                // let html = $('html')
                // let input = $(e.target)
                // let locale = input.val()
                // let dir = input.data('dir')
                // html.attr('lang', locale)
                // html.attr('dir', dir)

                // $.ajax({
                //     type: "post",
                //     url: "{{ route('lang.toggle') }}",
                //     data: {
                //         'locale': locale
                //     },
                //     headers: {
                //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
                //     },
                //     success: function(response) {
                //         console.log(response)
                //     }
                // });
                // if (locale == 'en') {
                //     input.val('ar')
                //     input.data('dir', 'rtl')
                // } else {
                //     input.val('en')
                //     input.data('dir', 'ltr')
                // }
            })
        });
    </script>
@endpush
