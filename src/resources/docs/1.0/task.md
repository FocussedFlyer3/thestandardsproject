# Task  
This is an object representing a task assigned to a user. You can assign, update status and get all tasks.
<br/>
### The Task Object:
```JSON
"tasks": [
    {
        "id": 1,
        "name": "Math is fun",
        "url": "http://localhost:8086/video",
        "scoreInfo": {
            "score_id": 15,
            "score": 50
        },
        "status": 2
    },
    {
        "id": 2,
        "name": "Space Math",
        "url": "localhost",
        "scoreInfo": {
            "score_id": 18,
            "score": 0
        },
        "status": 0
    }
]
```  

### Status code:
```JSON
'0' => Have not started
'1' => In progress
'2' => Done
```
Above is the meaning behind the status code on indicating the status of a task assigned.

---

- [Get all tasks available](/{{route}}/{{version}}/task#section-1)
- [Get all user's tasks](/{{route}}/{{version}}/task#section-2)
- [Assign a task to a user](/{{route}}/{{version}}/task#section-3)
- [Update task's status](/{{route}}/{{version}}/task#section-4)


<a id="section-2"></a>
## Get all tasks available
This API will return an array of tasks available in the system.
Endpoint:
```perl
GET '/tasks'
```

<br/>

<a id="section-2"></a>
## Get all user's tasks
This API will return an array of tasks assigned to `{userID}`.  
Endpoint:
```perl
GET '{userID}/tasks'
```

> {info} Calling this API with a teacher `{userID}` will return all the tasks assigned to students

<br/>

<a id="section-3"></a>
## Assign a task to a user
This API will assign users mentioned in `"students_id"` field with task `{taskID}`.  
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
> {info} A task can be updated with a done status `2` by calling [score API](/{{route}}/{{version}}/score#section-1)

<br/>

<a id="section-4"></a>
## Update task's status
This API will update a user current task's status to in progress and it should only be called on user first click on a task
Endpoint:
```perl
PUT '{userID}/tasks/{taskID}'
```

> {info} on task that is not found, API will return `(400) Bad Request` response
