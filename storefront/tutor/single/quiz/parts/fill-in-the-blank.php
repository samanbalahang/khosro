<div id="quiz-matching-ans-area" class="quiz-question-ans-choice-area tutor-mt-40 question-type-<?php echo $question_type; ?> <?php echo $answer_required ? 'quiz-answer-required' : ''; ?> ">
	<?php

	
	if ( is_array( $answers ) && count( $answers ) ) {
		foreach ( $answers as $answer ) {
			$answer_title                         = stripslashes( $answer->answer_title );
			$answer->is_correct ? $quiz_answers[] = $answer->answer_id : 0;
			?>
	<div class="fill-in-the-gap tutor-fs-6 tutor-body-color">
			<?php
			$count_dash_fields = substr_count( $answer_title, '{dash}' );
			if ( $count_dash_fields ) {

				$dash_string = array();
				$input_data  = array();
				for ( $i = 1; $i <= $count_dash_fields; $i ++ ) {
					$dash_string[] = '{dash}';
					$input_data[]  = "<div class='fill-blank'><input type='text' name='attempt[{$is_started_quiz->attempt_id}][quiz_question][{$question->question_id}][]' class='tutor-form-control' /></div>";
				}
				echo str_replace( $dash_string, $input_data, $answer_title );
			}
			?>
	</div>
			<?php
		}
	}
	?>
</div>
