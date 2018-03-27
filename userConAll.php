
<div class="col_full">
    <div class="heading-block center nobottomborder">
        <h2>User Contribution</h2>
        <span>Here is user contribution statistics</span>
    </div>

        <?php
        $result = $conn->query("SELECT count(*) as Total from user");

        foreach ($result as $r) {
                $totalU = $r['Total'];
        }
        ?>
        <?php
        $result = $conn->query("SELECT count(*) as Total from student_ideas");

        foreach ($result as $r) {
                $totalI = $r['Total'];
        }
        ?>

        <?php
        $result = $conn->query("SELECT count(*) as Total from comment");

        foreach ($result as $r) {
                $totalC = $r['Total'];
        }
        ?>

    <div class="col_one_fourth center" data-animate="bounceIn">
        <i class="i-plain i-xlarge divcenter nobottommargin icon-users"></i>
        <div class="counter counter-large" style="color: #3498db;"><span data-from="0" data-to="<?= $totalU ?>"
                                                                         data-refresh-interval="50"
                                                                         data-speed="2000"></span>
        </div>
        <h5>Total Contributors</h5>
    </div>

    <div class="col_one_fourth center" data-animate="bounceIn" data-delay="200">
        <i class="i-plain i-xlarge divcenter nobottommargin icon-code"></i>
        <div class="counter counter-large" style="color: #e74c3c;"><span data-from="0" data-to="<?= $totalI ?>"
                                                                         data-refresh-interval="50"
                                                                         data-speed="2500"></span>
        </div>
        <h5>Total Ideas</h5>
    </div>

    <div class="col_one_fourth center" data-animate="bounceIn" data-delay="400">
        <i class="i-plain i-xlarge divcenter nobottommargin icon-briefcase"></i>
        <div class="counter counter-large" style="color: #16a085;"><span data-from="0" data-to="<?= $totalC ?>"
                                                                         data-refresh-interval="50"
                                                                         data-speed="3500"></span>
        </div>
        <h5>Total Comments</h5>
    </div>

    <div class="col_one_fourth center col_last" data-animate="bounceIn" data-delay="600">
        <i class="i-plain i-xlarge divcenter nobottommargin icon-cup"></i>
        <div class="counter counter-large" style="color: #9b59b6;"><span data-from="100" data-to="874" data-refresh-interval="30" data-speed="2700"></span></div>
        <h5>Cups of Coffee</h5>
    </div>


</div>
<div class="clear"></div>