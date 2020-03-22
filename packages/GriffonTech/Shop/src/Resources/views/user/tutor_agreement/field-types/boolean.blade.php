<?php $selectedOption = old($attribute->code) ?: $tutor_agreement[$attribute->code] ?>

<label>
    <input type="checkbox" id="{{ $attribute->code }}" name="{{ $attribute->code }}" {{ $selectedOption ? 'checked' : ''}} value="1">
</label>

