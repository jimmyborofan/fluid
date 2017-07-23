
 <div class="row">
    <div class="col-sm-6" >Create A New Task</div>
    <div class="col-sm-6" >
        <button name="createTask" id="createTask" class="btn btn-primary btn-large">
            Create New Task
        </button>
    </div>
</div>
<table class="table-striped" id="taskData">
    <thead>
        <tr>
            <th>Task #</th>
            <th>Title</th>
            <th>Details</th>
            <th>Assignee</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Task #</th>
            <th>Title</th>
            <th>Details</th>
            <th>Assignee</th>
            <th>Status</th>
            <th>Priority</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </tfoot>
    <?php
    foreach ($data['table'] as $row) {
        echo "<tr id=\"taskRow".$row['task_id']."\">";
        echo "<td id=\"taskId".$row['task_id']."\" >".$row['task_id']."</td>";
        echo "<td id=\"taskName".$row['task_id']."\"><a title\"See details for this task\" id=\"testNameAnchor".$row['task_id']."\" href=\"index.php?/page/showtask/".$row['task_id']."/\" >".$row['taskname']."</a></td>";
        echo "<td id=\"taskDetails".$row['task_id']."\">".$row['details']."</td>";
        echo "<td id=\"taskAssignee".$row['task_id']."\">".$row['assignee']."</td>";
        echo "<td><div id=\"taskStatus".$row['task_id']."\" style=\"width: 100%; background:".$row['scolour'].";\" >".$row['status']."</div></td>";
        echo "<td><div id=\"taskLabel".$row['task_id']."\" style=\"width: 100%; background:".$row['lcolour'].";\" >".$row['label']."</div></td>";
        echo "<td><button class=\"btn btn-primary btn-lrg\" id=\"edit".$row['task_id']."\" >Edit</button></td>";
        echo "<td><button class=\"btn btn-primary btn-lrg\" onclick=\"deleteTask('".$row['task_id']."') \" id=\"delete".$row['task_id']."\" >Delete</button></td>";
        echo "</tr>";
    }
    ?>
</table>