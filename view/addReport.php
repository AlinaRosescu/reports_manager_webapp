<?php

session_start();
require_once(dirname(__FILE__) . "/auth.php");
require_once(dirname(__FILE__) . "/header.php");
require_once(dirname(__FILE__) . "/../model/db_report.php");
require_once(dirname(__FILE__) . "/../model/db_status.php");

$editReport = [];

if(!empty($_POST['edit'])) {
    $id = $_POST['id_report'];
    $reports = getReport($id);
    foreach ($reports as $report) {
        $editReport = $report;
    }
    $issue = $editReport['issue'];
    $startDate = $editReport['startdate'];
    $endDate = $editReport['enddate'];
    $details = $editReport['details'];
    $line = $editReport['line'];
    $statusID = $editReport['status_id'];
}

$dbStatus = getStatuses();

?>

<div class="box">
    <div class="registerBox">
        <form method="post" action="reports.php">
            <h2>Add new report</h2>
            <label for="issue">
                <span>Issue</span>
                <input type="text" name="issue" value="<?= !empty($editReport['issue']) ? $editReport['issue'] :  ""; ?>">
            </label>

            <label for="startdate">
                <span>From</span>
                <input type="text" name="startdate" id="start" value="<?= !empty($editReport['startdate']) ? $editReport['startdate'] :  ""; ?>">
            </label>

            <label for="enddate">
                <span>To</span>
                <input type="text" name="enddate" id="end" value="<?= !empty($editReport['enddate']) ? $editReport['enddate'] :  ""; ?>">
            </label>

            <label for="details">
                <span>Details</span>
                <textarea name="details"><?= !empty($editReport['details']) ? $editReport['details'] :  ""; ?></textarea>
            </label>

            <label for="line">
                <span>Production line</span>
                <select name="line">
                    <option value="1" <?php if(!empty($editReport) && $editReport['line']==1) {echo "selected='selected'";} ?> >1</option>
                    <option value="2" <?php if(!empty($editReport) && $editReport['line']==2) {echo "selected='selected'";}  ?> >2</option>
                    <option value="3" <?php if(!empty($editReport) && $editReport['line']==3) {echo "selected='selected'";} ?> >3</option>
                    <option value="4" <?php if(!empty($editReport) && $editReport['line']==4) {echo "selected='selected'";} ?> >4</option>
                </select>
            </label>

            <label for="status">
                <span>Status</span>
                <select name="status">
                    <?php
                    foreach ($dbStatus as $status) { ?>
                        <option <?php if(!empty($editReport) && $editReport['id'] == ($status['id'])) { echo "selected='selected'";} ?> > <?=ucfirst($status['status'])?></option>
                    <?php } ?>
                </select>
            </label>

            <?php
            if(!empty($_POST['edit'])) { ?>
                <input name="id_edit" type="hidden" value="<?=$id?>"/>
                <input type='submit' name='submitEdit' value='Submit'>
            <?php } else { ?>
                <input type='submit' name='submitReport' value='Submit'>
            <?php } ?>
        </form>
    </div>
</div>

<?php
require_once(dirname(__FILE__) . "/footer.php");
?>





