<div class="description">
    <h3>Details</h3>
    <?=$data['details'];?>
</div>
<div class="assignee">
    This task has been assigned to <?=$data['assignee'];?>
</div>
<div class="label" style="width: 30px;background: <?=$data['lcolour']; ?>">
    <?=$data['label'];?>
</div>
<div class="status" style="width: 30px;background: <?=$data['scolour']; ?>">
    <?=$data['status'];?>
</div>
<div class="back" >
    <button class="backButton btn btn-lrg btn-primary" >Back To Tasks </button>
</div>

