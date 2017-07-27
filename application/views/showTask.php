<div class="page-header">
    <h1> <?= $data['taskname']; ?> <small> - Task Details</small></h1>
</div>
<ul class="media-list">
    <li class="media">
        <a class="pull-left" href="#">
            Details
        </a>
        <div class="media-body">
            <div class="descriptionShw">
                <?= $data['details']; ?>
            </div>
        </div>
    </li>
    <li class="media">
        <a class="pull-left" href="#">
            This task has been assigned to
        </a>
        <div class="media-body">
            <div class="assigneeShw">
                <?= $data['assignee']; ?>
            </div>
        </div>
    </li>
    <li class="media">
        <a class="pull-left" href="#">
            The priority is set to :
        </a>
        <div class="media-body">
            <div class="labelShw" style="background: <?= $data['lcolour']; ?>">
                <?= $data['label']; ?>
            </div>
        </div>
    </li>
    <li class="media">
        <a class="pull-left" href="#">
            And the current status is :
        </a>
        <div class="media-body">
            <div class="statusShw" style="background: <?= $data['scolour']; ?>">
                <?= $data['status']; ?>
            </div>
        </div>
    </li>
</ul>
<div class="back" >
    <button class="backButton btn btn-lrg btn-primary" >Back To Tasks </button>
</div>  