# Score  
For now, you can only update a score of an assigned task.
<br/>

---

- [Post API From a Task](/{{route}}/{{version}}/score#section-1)

<a id="section-1"></a>
## Post API from a task
This API assigns scores to a task as well as records student's answers from task.

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
		"quiz_score": 8,
		"student_answers": [
		{
			"question_id": 1,
			"answer": "B"
		},
		{
			"question_id": 2,
			"answer": "D"
		},
		{
			"question_id": 3,
			"answer": "D"
		},
		{
			"question_id": 4,
			"answer": "C"
		}
		]
	}
}
```
`records` is the recording of a student's progress in module.
`game_score` is an optional field, but `quiz_score` and `student_answers` should be returned from a task.

> {info} If a score is already assigned to a task, the new score will replace the previous score!


