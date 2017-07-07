<?php
session_start();

require_once(dirname(__FILE__) . "/auth.php");
require_once(dirname(__FILE__) . "/header.php");
require_once(dirname(__FILE__) . "/../model/db_report.php");
require_once(dirname(__FILE__) . "/../model/db_status.php");

if(!empty($_POST['submitReport'])) {
    $issue = $_POST['issue'];
    $startDate = $_POST['startdate'];
    $endDate = $_POST['enddate'] ? $_POST['enddate'] : "0000-00-00 00:00:00";
    $details = $_POST['details'] ? $_POST['details'] : "";
    $line = $_POST['line'] ? $_POST['line'] : "1";
    $status = $_POST['status'] ? $_POST['status'] : "";

    $db_statusID = getStatusID($status);
    $statusId = "";
    foreach ($db_statusID as $db_id) {
        foreach ($db_id as $item) {
            $statusId = $item;
        }
    }
    $userID = $_SESSION['id'];
    addReport($issue, $startDate, $endDate, $details, $line, $userID, $statusId);
}

if(!empty($_POST['submitEdit'])) {
    $id = $_POST['id_edit'];
    $issue = $_POST['issue'];
    $startDate = $_POST['startdate'];
    $endDate = $_POST['enddate'] ? $_POST['enddate'] : "0000-00-00 00:00:00";
    $details = $_POST['details'] ? $_POST['details'] : "";
    $line = $_POST['line'] ? $_POST['line'] : "1";
    $status = $_POST['status'] ? $_POST['status'] : "1";

    $db_statusID = getStatusID($status);
    $statusId = "";
    foreach ($db_statusID as $db_id) {
        foreach ($db_id as $item) {
            $statusId = $item;
        }
    }
    editReport($id,$issue, $startDate, $endDate, $details, $line, $statusId);
}

if(!empty($_POST['delete'])) {
    $idReport = $_POST['id_report'];
    deleteReport($idReport);
}

if(!empty($_POST['search'])) {
    $dbReports = getReportsBySearch($_POST['searchIssue']);
} elseif (!empty($_POST['filterLine'])) {
    $check_line = $_POST['check_line'];
    $list = implode(",", $check_line);
    $dbReports = getReportsFromList($list);
} elseif(!empty($_POST['filterStatus'])) {
    $check_status = $_POST['check_status'];
    $list = implode(",", $check_status);
    $dbReports = getReportsFromList($list);
} else {
    $dbReports = getReports();
}

$dbStatus = getStatuses();
?>

<div class="container">
    <aside>
        <form method="post" class="search" action="">
            <input type="search" name="searchIssue" placeholder="Search issues..." value=""/>
            <input type="submit" name="search" value="Search" />
        </form>
        <h3>Filter by</h3>
        <form method="post" action="">
            <span>Production line</span>
            <?php
            for($i=1; $i<=4; $i++) { ?>
                <label for="<?=$i?>"><input name="check_line[]" id="<?=$i?>" type="checkbox" value="<?=$i?>"/><?=$i?></label>
            <?php } ?>
            <input type="submit" name="filterLine" value="Filter line" />
        </form>
        <form method="post" action="">
            <span>Status</span>
            <?php
            foreach ($dbStatus as $status) { ?>
                <label for="<?=$status['status']?>">
                    <input id="<?=$status['status']?>" name="check_status[]" type='checkbox' value="<?=ucfirst($status['status'])?>"/><?=ucfirst($status['status'])?>
                </label>
            <?php } ?>
            <input type="submit" name="filterStatus" value="Filter status" />
        </form>
    </aside>
    <?php if($dbReports) { ?>
    <table>
        <tbody>
        <tr>
            <th>ID</th>
            <th>Issue</th>
            <th>From</th>
            <th>To</th>
            <th>Details</th>
            <th>Production line</th>
            <th>User</th>
            <th>Status</th>
            <th>Edit</th>
        </tr>
        <?php
        foreach($dbReports as $dbReport) { ?>
            <tr>
            <?php
            foreach ($dbReport as $key=>$value) { ?>
                <td><?=ucfirst($value)?></td>
            <?php } ?>
                <td>
                    <form id="operations" method="post" action="addReport.php">
                        <input name="id_report" type="hidden" value="<?=$dbReport['id']?>"/>
                        <input name="edit" type="submit" value="Edit" />
                    </form>
                    <form id="operations" method="post" action="">
                        <input name="id_report" type="hidden" value="<?=$dbReport['id']?>"/>
                        <input name="delete" type="submit" value="X" />
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php } else { ?>
        <p style="display:inline-block;vertical-align:top; padding-left:15px;color:#367BAA;margin-top:20px;">No results found...</p>
    <?php } ?>
</div>

<?php
require_once(dirname(__FILE__) . "/footer.php");
?>