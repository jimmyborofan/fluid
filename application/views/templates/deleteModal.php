<div id="dialogDelete" title="Delete Task">
    <form>
        <fieldset>
            <label for="delTask">Are you Sure?</label>
            <div id="delTask">Click Delete Task to continue or cancel to return </div>
            <input type="hidden" name="taskFormTaskID" id="taskFormTaskID" />
            <!-- Allow form submission with keyboard without duplicating the dialog button -->
            <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
        </fieldset>
    </form>
</div>