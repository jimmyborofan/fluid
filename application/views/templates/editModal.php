<div id="dialogEdit" title="Edit Task">

    <form>
        <fieldset>
            <label for="name">Name</label>
            <br />
            <input type="text" name="taskname"  id="taskname" placeholder="Name of Task" class="text form-control ui-widget-content ui-corner-all">
            <br />
            <label for="details">Details</label>
            <br />
            <textarea name="details" id="details" placeholder="details" class="text form-control ui-widget-content ui-corner-all">
            </textarea><br />
            <label for="assign">Assign to</label>
            <select name="assign" id="assign">
                <option value="x">Select...</option>
                <?php
                foreach ($form['users'] as $user) {
                    echo "<option value=\"" . $user['userId']."\">"
                            . "".$user['username'] . "</option>";
                }
                ?>
            </select>
            <br />
            <label for="status">Status</label>
            <select name="status" id="status">
                <option value="x">Select...</option>
                <?php
                foreach ($form['status'] as $status) {
                    echo "<option value=\"" . $status['statusId'] . "\">"
                            . "" . $status['name'] . "</option>";
                }
                ?>
            </select>
            <br />
            <label for="label">Priority</label>
            <select name="label" id="label">
                <option value="x">Select...</option>
                <?php
                foreach ($form['labels'] as $lbl) {
                    echo "<option value=\"" . $lbl['labelId']
                            ."\">" . $lbl['name'] . "</option>";
                }
                ?>
            </select>
            <br />
            <input type="hidden" name="taskFormTaskID" id="taskFormTaskID" />
            <!-- Allow form submission with keyboard without duplicating the dialog button -->
            <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
        </fieldset>
    </form>
</div>