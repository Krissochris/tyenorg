<select class="form-control" id="{{ $attribute->code }}" name="{{ $attribute->code }}" >

    <?php $selectedOption = old($attribute->code) ?: $tutor_agreement[$attribute->code] ?>

        @foreach ($attribute->options as $option)
            <option value="{{ $option->id }}" {{ $option->id == $selectedOption ? 'selected' : ''}}>
                {{ $option->admin_name }}
            </option>
        @endforeach

</select>
