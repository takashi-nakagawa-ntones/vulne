<?php include_once("parts/Include.php"); ?>
<?php include_once("./../back/createtestdb.php");?>

<?php include_once("parts/PartsHead.php"); ?>

<div id="container" class="d-flex flex-column">

    <div id="top_container" class="d-flex flex-row">
        <div id="area_top_left w-50"></div>
        <div id="area_top_right w-50">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">DataBase</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Personal Data</h6>
                    <div class="card-text">
                        <table class="table table-sm">
                            <thead>
                                <th>ID</th><th>NAME</th><th>ADDRESS</th><th>AGE</th><th>SALARY</th>
                            </thead>
                            <tbody>
                                <?php foreach($testData as $key => $val): ?>
                                    <tr><td><?=$key?><td><?=$val[0]?></td><td><?=$val[1]?></td><td><?=$val[2]?></td><td><?=$val[3]?></td></tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="btm_container" class="d-flex flex-row">
        <div id="area_btm_left w-50"></div>
        <div id="area_btm_right w-50"></div>
    </div>





</div>


<?php include_once("parts/PartsFoot.php"); ?>