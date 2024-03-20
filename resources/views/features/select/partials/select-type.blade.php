<div class="form-group text_box col-lg-6 col-md-6">
    <x-select-input label="Type Of Item" id="type" placeholder="Choose Type" name="type"
    required autofocus>
        @foreach ($types as $type)
            <option value="{{ $type->value }}" @selected($type->value == old('type')) >{{ str($type->value)->headline() }}</option>
        @endforeach
    </x-select-input>
</div>