SELECT
　*
FROM
　questions
INNER JOIN
　answers
ON
　question.id = answers.question_id;

SELECT
  *
FROM
  questions
INNER JOIN
  question_types
ON
  question_type_id = question_types.id;