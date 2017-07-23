$(document).ready(function () {
    /*
     * set the datatable script running for the tasks table
     */
    $('#taskData').DataTable();

    /**
     *
     * Create New task button listener
     * This uses the same modal as edit,
     * however the JS is independant of the modal
     * and does not contain any JS
     * This means different events can call the same code
     */
    $('#createTask').click(function () {
        createDialog.dialog("open");
    })
    /*
     * Modal Script for Adding table data
     */
    var createDialog = $("#dialogCreate").dialog({
        autoOpen: false,
        height: 400,
        width: 350,
        modal: true,
        buttons: {
            "Save Task Details": createTask,
            Cancel: function () {
                createDialog.dialog("close");
            }
        }
    });

    /*
     * Modal script for deleting data
     */
    var deleteDialog = $("#dialogDelete").dialog({
        autoOpen: false,
        height: 400,
        width: 350,
        modal: true,
        buttons: {
            "Delete Task": sendDeleteTask,
            Cancel: function () {
                deleteDialog.dialog("close");
            }
        }
    });

    /*
     * Modal script for editing table data
     */
    var editDialog = $("#dialogEdit").dialog({
        autoOpen: false,
        height: 400,
        width: 350,
        modal: true,
        buttons: {
            "Save Task Details": editTask,
            Cancel: function () {
                editDialog.dialog("close");
            }
        }
    });

    /*
     * when 'Edit button is clicked, the task ID is discovered,
     * these details are then sent to the dialog box and a
     * quick ajax request to insert the data
     *
     */
    $("[id^='edit']").click(function () {
        var thisId = this.id;
        idNum = thisId.replace("edit", "");
        getTaskData(idNum);
        $('#taskFormTaskID').val(idNum);
        $("#dialogEdit").prop({"title" : "Edit Task"});
        editDialog.dialog("open");
    });

    /*
     * E/O document.ready()
     */
});


function editTask() {
    taskName = $('#taskname').val();
    taskDetails = $('#details').val();
    assignedTo = $('#assign').val();
    status = $('#status').val();
    statusText = $('#status option:selected').text();
    labelText = $('#label option:selected').text();
    label = $('#label').val();
    taskID = $('#taskFormTaskID').val();
    $.ajax({
        url: "/index.php?/ajax/saveTask ",
        method: "POST",
        dataType: 'json',
        data: {
            taskId: taskID,
            taskName: taskName,
            taskDetails: taskDetails,
            assignedTo: assignedTo,
            status: status,
            label: label
        }
    }).done(function (data) {
        taskData = data[0];
        $('#testNameAnchor' + taskID).html(taskData.taskname);
        $('#taskDetails' + taskID).html(taskData.details);
        $('#taskAssignee' + taskID).html(taskData.assignee);
        $('#taskStatus' + taskID).html(statusText);
        $('#taskLabel' + taskID).html(labelText);
        var scolour = taskData.scolour;
        var lcolour = taskData.lcolour;
        $('#taskLabel' + taskID).css({"background": lcolour});
        $('#taskStatus' + taskID).css({"background": scolour});
    });

    $("#dialogEdit").dialog("close");
}

/**
 * Delete Task Listener on click display modal and insert correct values
 * @param {INT} taskId
 * @returns {void}
 */
function deleteTask(taskId) {
    console.log(taskId);
    $('#taskFormTaskID').val(taskId);
    $("#dialogDelete").dialog("open");
}

/*
 * Cend the ajax request to soft delete row from database
 * @returns {boolean}
 */
function sendDeleteTask() {
    taskID = $('#taskFormTaskID').val();
    $.ajax({
        url: "/index.php?/ajax/deleteTask ",
        method: "POST",
        dataType: 'json',
        data: {
            taskId: taskID
        }
    }).done(function (data) {
        console.log(data.success);
        console.log("---------------");
        console.log(data);
        console.log("---------------");
        if (data.success == true || data.success == "true") {
            $("#taskRow" + taskID).css({"display": "none"});
        } else {
            alert("There has been an error, please try again, \n if " +
                    "you keep seeing this message, \n " +
                    "Please report the error to your Sys Admin")
        }
        $("#dialogDelete").dialog("close");
    });

}

function createTask() {
    taskName = $('#create_taskname').val();
    taskDetails = $('#create_details').val();
    assignedTo = $('#create_assign').val();
    status = $('#create_status').val();
    label = $('#create_label').val();

    $.ajax({
        url: "/index.php?/ajax/newTask ",
        method: "POST",
        dataType: 'json',
        data: {
 
            taskName: taskName,
            taskDetails: taskDetails,
            assignedTo: assignedTo,
            status: status,
            label: label
        }
    }).done(function (data) {
        console.log(data);
    });
    $("#dialogCreate").dialog("close");
    /**
     * If I had a bit more time I would have used a jquery function
     * to insert the row, then reload the table with the new data
     * however, a page reload is much faster in this dev env.
     *
     */
    window.location.reload();
}


function getTaskData(taskID) {
    $.ajax({
        url: "/index.php?/ajax/getJSONTask ",
        method: "POST",
        dataType: 'json',
        data: {
            taskId: taskID,
        }
    }).done(function (data) {
        taskData = data[0];
        console.log(taskData.taskname)
        $('#taskname').val(taskData.taskname);
        $('#details').val(taskData.details);
        console.log("--------------------");
        console.log(taskData.statusId);
        console.log(taskData.labelId);
        console.log(taskData.userId);
        console.log("--------------------");
        $('#label').val(taskData.labelId).change();
        $('#status').val(taskData.statusId).change();
        $('#assign').val(taskData.userId).change();
    });



}