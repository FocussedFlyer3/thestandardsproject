# Score  
For now, you can only update a score of an assigned task.
<br/>

---

- [Assign Score From a Task](/{{route}}/{{version}}/account#section-1)

<a id="section-1"></a>
## Assign Score From a Task
Endpoint:
```perl
POST '{userID}/score/{taskID}'
```
<br/>
Expected Body on POST:
```JSON
"scoreInfo":{
	"score": "50",
	"class_id": "1"
}
```
> {info} If a score is already assigned to a task, the new score will replace the previous score!


