<?php
session_start();

if (isset($_SESSION['user_role']) && $_SESSION['user_role'] != 2) {
        include 'userRestrict.php';
} else {

        include 'header.php';


        if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

                include 'connect-db.php';
        $result = $conn->query("SELECT count(*) as Total from user");

        foreach($result as $r){
        $total = $r['Total'];
                }
                ?>


            <!-- Content
                    ============================================= -->
            <section id="content">

                <div class="content-wrap">

                    <div class="container clearfix">
                        <div class="row clearfix">

                            <div class="col-xl-5">
                                <div class="heading-block topmargin">
                                    <h2> Total User
                                        <span>
                                        <?= $total; ?>
                                        </span></h2>
                                </div>

<?php
$resultBit = $conn->query("select count(user_id) as user_id
from user,department
where department.department_id=user.department_id
and user_role='0'
and department.department_name='BIT'");
foreach($resultBit as $r){

    $bit =  $r['user_id'];
}
$bitPercent = (100/$total) * $bit;

?>

                                <div class="col_half center col_last nobottommargin">
                                    <b>BIT </b>
                                    <div class="rounded-skill nobottommargin" data-color="Red" data-size="200"
                                         data-percent="<?=$bitPercent?>"
                                         data-width="3" data-speed="6500">
                                        <div class="counter counter-inherit"><span data-from="0" data-to="<?=$bitPercent?>"
                                                                                   data-refresh-interval="50"
                                                                                   data-speed="6000"></span>%
                                        </div>
                                    </div>

                                </div>

                                <?php
                                $resultL5dc = $conn->query("select count(user_id) as user_id
                                from user,department
                                where department.department_id=user.department_id
                                and user_role='0'
                                and department.department_name='L5DC'");
                                foreach($resultL5dc as $r){

                                $bit =  $r['user_id'];
                                }
                                $l5dcPercent = (100/$total) * $bit;
                                ?>

                                <div class="col_half center col_last nobottommargin">
                                    <B>L5DC</B>
                                    <div class="rounded-skill nobottommargin" data-color="blue" data-size="200"
                                         data-percent="<?=$l5dcPercent?>"
                                         data-width="3" data-speed="6500">
                                        <div class="counter counter-inherit"><span data-from="0" data-to="<?=$l5dcPercent?>"
                                                                                   data-refresh-interval="50"
                                                                                   data-speed="6000"></span>%
                                        </div>
                                    </div>
                                </div>

                                <div class="line"></div>

                                <?php
                                $resultL4dc = $conn->query("select count(user_id) as user_id
                                from user,department
                                where department.department_id=user.department_id
                                and user_role='0'
                                and department.department_name='L4DC'");
                                    foreach($resultL4dc as $r){

                                            $bit =  $r['user_id'];
                                    }
                                    $l4dcPercent = (100/$total) * $bit;

                                 ?>

                                <div class="col_half center col_last nobottommargin">
                                    <b>L4DC</b>
                                    <div class="rounded-skill nobottommargin" data-color="green" data-size="200"
                                         data-percent="<?=$l4dcPercent?>"
                                         data-width="3" data-speed="6500">
                                        <div class="counter counter-inherit"><span data-from="0" data-to="<?=$l4dcPercent?>"
                                                                                   data-refresh-interval="50"
                                                                                   data-speed="6000"></span>%
                                        </div>
                                    </div>
                                </div>
                                    <?php
                                    $resultIfy = $conn->query("select count(user_id) as user_id
                                from user,department
                                where department.department_id=user.department_id
                                and user_role='0'
                                and department.department_name='IFY'");
                                    foreach($resultIfy as $r){

                                            $bit =  $r['user_id'];
                                    }
                                    $ifyPercent = (100/$total) * $bit;

                                    ?>
                                <div class="col_half center col_last nobottommargin">
                                    <b>IFY</b>
                                    <div class="rounded-skill nobottommargin" data-color="yellow" data-size="200"
                                         data-percent="<?= $ifyPercent ?>"
                                         data-width="3" data-speed="6500">
                                        <div class="counter counter-inherit"><span data-from="0" data-to="<?= $ifyPercent ?>"
                                                                                   data-refresh-interval="50"
                                                                                   data-speed="6000"></span>%
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $resultIfy = $conn->query("select count(user_id) as user_id
                                from user,department
                                where department.department_id=user.department_id
                                and user_role IN (1, 2, 3, 4)");
                                    foreach($resultIfy as $r){

                                            $bit =  $r['user_id'];
                                    }
                                    $ifyPercent = (100/$total) * $bit;

                                    ?>
                                <br>
                                <div class="col_half center col_last nobottommargin">
                                    <b>Employee/Staff</b>
                                    <div class="rounded-skill nobottommargin" data-color="yellow" data-size="200"
                                         data-percent="<?= $ifyPercent ?>"
                                         data-width="3" data-speed="6500">
                                        <div class="counter counter-inherit"><span data-from="0" data-to="<?= $ifyPercent ?>"
                                                                                   data-refresh-interval="50"
                                                                                   data-speed="6000"></span>%
                                        </div>
                                    </div>
                                </div>
                                <div class="line"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>


                <?php
        } else {
                include 'userLoginFirst.php';
        }

        include 'footer.php';
} ?>
