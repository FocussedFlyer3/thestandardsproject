# Task  
For now, you can only get all user's tasks and assign a task to a user.
<br/>
### The Task Object:
```JSON
"tasks": [
    {
        "id": 1,
        "name": "Math is fun",
        "url": "localhost",
        "scoreInfo": {
            "score_id": 12,
            "score": 0
        }
    },
    {
         "id": 2,
        "name": "Space Math",
        "url": "localhost",
        "scoreInfo": {
             "score_id": 17,
            "score": 0
        }
    }
]

```  

---

- [Get all user's tasks](/{{route}}/{{version}}/task#section-1)
- [Assign a task to a user](/{{route}}/{{version}}/task#section-2)

<a id="section-1"></a>
## Get all user's tasks
Endpoint:
```perl
GET '{userID}/tasks'
```

<a id="section-2"></a>
## Assign a task to a user
Endpoint:
```perl
POST '{userID}/assign/{taskID}'
```

> {info} `{userID}` is the ID of assignor and `{students_id}` is the assignee ids. Essentially, `{userID}` would be assigning tasks to `{student_id}`.

Expected Body on POST:
```JSON
"task":{
	"class_id": "1",
	"students_id": [5,6]
}
```

