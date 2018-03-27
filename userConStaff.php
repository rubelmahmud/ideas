<div class="container" align="center">

        <div class="col_full">
                <div class="heading-block center nobottomborder">
                        <h2>Your Contribution</h2>
                        <span>Here is your contribution statistics</span>
                </div>

                <?php
                $result = $conn->query("SELECT count(user_id) as Total from comment
where comment.user_id=$userId");

                foreach($result as $r){
                        $totalC = $r['Total'];
                }
                ?>
                <div class="col_one_fourth_center col_last" data-animate="bounceIn" data-delay="600">
                        <i class="i-plain i-xlarge divcenter nobottommargin icon-cup"></i>
                        <div class="counter counter-large" style="color: #9b59b6;"><span data-from="0" data-to="<?php echo $totalC; ?>"
                                                                                         data-refresh-interval="30"
                                                                                         data-speed="2700"></span></div>
                        <h5>Total Comments</h5>
                </div>
        </div>
</div>
<div class="clear"></div>