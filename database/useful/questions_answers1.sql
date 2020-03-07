SELECT
　*
FROM
　questions
INNER JOIN
　answers
ON
　question.id = answers.question_id;