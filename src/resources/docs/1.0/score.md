# Score  
For now, you can only update a score of an assigned task.
<br/>

---

- [Post API from a Task](/{{route}}/{{version}}/score#section-1)

<a id="section-1"></a>
## Post API from a task
This API assigns scores to a task, records student's answers from task and update status of task to done `2`.

> {info} This will be the only way to update a user's task to done status `2`.

Endpoint:
```perl
POST '{userID}/score/{taskID}'
```
<br/>
Expected Body on POST:
```JSON
"scoreInfo":{
	"score": "50",
	"class_id": "1",
	"records": {
		"game_score": 100,
		"quiz_score": 5,
		"student_answers": [
		{
			"question_id": 1,
			"answer": "B",
			"correct_answer": "A"
		},
		{
			"question_id": 2,
			"answer": "A",
			"correct_answer": "B"
		},
		{
			"question_id": 3,
			"answer": "D",
			"correct_answer": "D"
		},
		{
			"question_id": 4,
			"answer": "B",
			"correct_answer": "B"
		}
		]
	}
}
```
`records` is the recording of a student's progress in module.
`game_score` is an ***optional*** field, but `quiz_score` and `student_answers` should be returned from a task.

> {warning} Formatting for `"records"` field should be strictly follow unless mentioned optional.

<br/>

> {info} If a score is already assigned to a task, the new score will replace the previous score!


