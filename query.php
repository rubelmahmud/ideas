<?php
/**
 * Created by PhpStorm.
 * User: Rubel
 * Date: 3/17/2018
 * Time: 1:28 PM

SELECT * FROM `student_ideas`, `student`, `category`

WHERE student_ideas.student_id = student.student_id AND
student_ideas.category_id = category.category_id
ORDER BY student_ideas.posted_time DESC
 *
 *
 *



 */