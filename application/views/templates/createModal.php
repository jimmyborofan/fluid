<div id="dialogCreate" title="Create A New Task">
    <form>
        <fieldset>
            <label for="create_name">Name</label>
            <br />
            <input type="text" name="create_taskname"  id="create_taskname" placeholder="Name of Task" class="text form-control ui-widget-content ui-corner-all">
            <br />
            <label for="create_details">Details</label>
            <br />
            <textarea name="create_details" id="create_details" placeholder="details" class="text form-control ui-widget-content ui-corner-all">
            </textarea><br />
            <label for="create_assign">Assign to</label>
            <select name="create_assign" id="create_assign">
                <option value="1">Select...</option>
                <?php
                    foreach ($form['users'] as $user) {
                        echo "<option value=\"" . $user['userId'] . "\">"
                        . "" . $user['username'] . "</option>";
                    }
                ?>
            </select>
            <br />
            <label for="create_status">Status</label>
            <select name="create_status" id="create_status">
                <option value="1">Select...</option>
                <?php
                    foreach ($form['status'] as $status) {
                        echo "<option value=\"" . $status['statusId'] . "\">"
                        . "" . $status['name'] . "</option>";
                    }
                ?>
            </select>
            <br />
            <label for="create_label">Priority</label>
            <select name="create_label" id="create_label">
                <option value="1">Select...</option>
                <?php
                    foreach ($form['labels'] as $lbl) {
                        echo "<option value=\"" . $lbl['labelId']
                        . "\">" . $lbl['name'] . "</option>";
                    }
                ?>
            </select>
            <br />
            <!-- Allow form submission with keyboard without duplicating the dialog button -->
            <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
        </fieldset>
    </form>
</div>