<?php

// form number
if (request()->input('form_number')) {
    $form_number = request()->input('form_number');
} else {
    $form_number = 1;
}
?>
<div id="course_1">
    <div class="form-group">
        {!! Form::label("courses[$form_number][course_name]", 'Course Name') !!}
        {!! Form::text("courses[$form_number][course_name]", null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label("courses[$form_number][course_experience_and_qualification]", 'Course Experience And Qualification') !!}
        {!! Form::text("courses[$form_number][course_experience_and_qualification]", null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label("courses[$form_number][how_well_can_u_tutor_course]", 'How Well Can You Tutor This Course') !!}
        @for($num =1; $num <= 10; $num++)
            <input name="courses[<?= $form_number ?>][how_well_can_u_tutor_course]" type="radio" value="{{ $num }}"> {{ $num }}
        @endfor
    </div>

    <div class="form-group">
        {!! Form::label("courses[$form_number][how_much_would_you_charge_per_student]", 'How Much Would You Charge Per Student') !!}
        {!! Form::number("courses[$form_number][how_much_would_you_charge_per_student]", null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label("courses[$form_number][would_you_be_willing_to_repeat_a_batch]", 'Would You Be Willing To Repeat A Batch?') !!}
        <input name="courses[<?= $form_number ?>][would_you_be_willing_to_repeat_a_batch]" type="radio" value="1">Yes
        <input name="courses[<?= $form_number ?>][would_you_be_willing_to_repeat_a_batch]" type="radio" value="0">No
    </div>

    <div class="form-group">
        {!! Form::label("courses[$form_number][do_you_agree_to_carry_student_along_after_batch_ends]", 'Do You Agree To Carry Students Along After Batch Ends?') !!}

        <input name="courses[<?= $form_number?>][do_you_agree_to_carry_student_along_after_batch_ends]" type="radio" value="1">Yes
        <input name="courses[<?= $form_number?>][do_you_agree_to_carry_student_along_after_batch_ends]" type="radio" value="0">No
    </div>
    <hr>
</div>
