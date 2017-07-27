<div class="pageDivider"><hr /></div>
<section id="createTask">
    <div class="row">
        <div class="col-sm-6" >Create A New Task</div>
        <div class="col-sm-6" >
            <button name="createTask" id="createTask" class="btn btn-primary btn-large">
                Create New Task
            </button>
        </div>
    </div>
    <div class="pageDivider"><hr /></div>
</section>
<section id="showTask">
    <table class="table table-striped table-bordered display " id="taskData">
        <thead>
            <tr>
                <th width="7%" >Task #</th>
                <th width="23%" >Title</th>
                <th width="23%" >Details</th>
                <th width="12%" >Assignee</th>
                <th width="10%" >Status</th>
                <th width="10%" >Priority</th>
                <th width="6%" >Edit</th>
                <th width="6%" >Delete</th>
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
                echo "<tr class=\"taskRow\" id=\"taskRow" . $row['task_id'] . "\">";
                echo "<td class=\"taskId\" id=\"taskId" . $row['task_id'] . "\" >" . $row['task_id'] . "</td>";
                echo "<td class=\"taskName\" id=\"taskName" . $row['task_id'] . "\"><a title\"See details for this task\" id=\"testNameAnchor" . $row['task_id'] . "\" href=\"index.php?/page/showtask/" . $row['task_id'] . "/\" >" . $row['taskname'] . "</a></td>";
                echo "<td class=\"taskDetails\" id=\"taskDetails" . $row['task_id'] . "\">" . $row['details'] . "</td>";
                echo "<td class=\"taskAsignee\" id=\"taskAssignee" . $row['task_id'] . "\">" . $row['assignee'] . "</td>";
                echo "<td><div class=\"taskStatus\" id=\"taskStatus" . $row['task_id'] . "\" style=\" background:" . $row['scolour'] . ";\" >" . $row['status'] . "</div></td>";
                echo "<td><div class=\"taskLabel\" id=\"taskLabel" . $row['task_id'] . "\" style=\" background:" . $row['lcolour'] . ";\" >" . $row['label'] . "</div></td>";
                echo "<td class=\"taskEdit\"><button class=\"btn btn-primary btn-lrg\" id=\"edit" . $row['task_id'] . "\" >Edit</button></td>";
                echo "<td class=\"taskDelete\"><button class=\"btn btn-primary btn-lrg\" onclick=\"deleteTask('" . $row['task_id'] . "') \" id=\"delete" . $row['task_id'] . "\" >Delete</button></td>";
                echo "</tr>";
            }
        ?>
    </table>
</section>