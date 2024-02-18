@props(['color' => 'primary', 'hasIcon' => false])
@php
    $colorClass = match ($color) {
        'primary' => 'agency_banner_btn2',
        'secondary' => 'btn-bg-grey',
        'dark' => 'btn-bg3',
        'success' => 'btn-bg1',
        default => '',
    };
    $type = $attributes->has('type') ? $attributes->get('type') : 'submit';
    $action = $attributes->has('action') ? $attributes->get('action') : '';
    $class = $attributes->has('class') ? $attributes->has('class') : '';
    $enctype = $attributes->has('enctype') ? $attributes->has('enctype') : 'multipart/form-data';
    $modalId = uniqid('delete-modal-');
@endphp

@switch(strtolower($type))
    @case('submit')
        <button
            {{ $attributes->merge(['class' => $hasIcon ? 'btn' : 'btn_hover agency_banner_btn btn-bg ' . $colorClass]) }}>{!! $slot ?? 'Button' !!}</button>
    @break

    @case('button')
        <button
            {{ $attributes->merge(['class' => $hasIcon ? 'btn' : 'btn_hover agency_banner_btn btn-bg ' . $colorClass]) }}>{!! $slot ?? 'Button' !!}</button>
    @break

    @case('link')
        <a
            {{ $attributes->merge(['class' => $hasIcon ? 'btn' : 'btn_hover agency_banner_btn btn-bg ' . $colorClass]) }}>{!! $slot ?? 'Link' !!}</a>
    @break

    @case('delete')
        <form class="w-max h-max" action="{{ $action }}" method="post" enctype="{{ $enctype }}">
            @csrf
            @method('DELETE')
            <button class="{{ $hasIcon ? 'btn' : 'btn_hover agency_banner_btn btn-bg ' . $colorClass . ' ' . $class }}"
                type="button" data-toggle="modal" data-target="#{{ $modalId }}">
                {!! $slot ?? 'Form Submit' !!}
            </button>
            <div class="modal fade" id="{{ $modalId }}" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
              
                    <!-- Modal body -->
                    <div class="modal-body modal-alert">
                      <div class="modal-img"><img class="mx-auto" src="{{asset('img/bin.png')}}"></div>
                      <div class="modal-text">Are sure of the deleting process ?</div>
                    </div>
                      <div class="modal-footer modal-btns">
                          <div class="payment-btns text-center">
                              <button type="submit" class="btn_hover agency_banner_btn btn-bg">Yes</button>
                              <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg3" data-dismiss="modal"> Cancel</button>
                          </div>
                        </div>
                  </div>
                </div>
              </div>
        </form>
    @break

    @default
        <button
            {{ $attributes->merge(['class' => 'btn_hover agency_banner_btn btn-bg ' . $colorClass]) }}>{!! $slot ?? 'Button' !!}</button>
@endswitch
