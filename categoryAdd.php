<?php
session_start();
if(isset($_SESSION['user_role']) && $_SESSION['user_role'] != 2){
        include 'userRestrict.php';
}else{

include 'header.php';


if (isset($_SESSION["loggedin"]) and $_SESSION["loggedin"] == TRUE) {

?>
<html>
<head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
 $( function() {
    var dateFormat = 'yy-mm-dd',
      from = $( "#closure_date" )
        .datepicker({
			minDate: 0,
          defaultDate: "+1w",
		   dateFormat: 'yy-mm-dd',
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#final_closure_date" ).datepicker({
        defaultDate: "+1w",
		 dateFormat: 'yy-mm-dd',
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });

    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }

      return date;
    }
  } );
  </script>
  <body>
<!-- Content
		============================================= -->
<section id="content">

    <div class="content-wrap">

        <!-- Comment Form
============================================= -->
        <div class="container">


            <div id="respond" class="clearfix">

                <h3>Add a <span>Category</span></h3>

                    <?php
                    if(isset($_SESSION['successCat'])){
                            ?>

                        <div class="alert alert-success">
                            <i class="icon-thumbs-up"></i><strong>Category Added successfully</strong>
                        </div>
                            <?php
                            unset($_SESSION['successCat']);

                    }
                    ?>

                <form class="clearfix" action="categoryAddSQL.php" method="POST" id="commentform">

                    <div class="form-group">
                        <label for="author">CATEGORY</label>
                        <input type="text" name="category_name" size="22" tabindex="1"
                               class="sm-form-control" required="required"/>
                    </div>
                    <div class="form-group">
                        <label for="comment">CATEGORY DESCRIPTION</label>
                        <textarea name="category_desc" cols="58" rows="7" tabindex="4"
                                  class="sm-form-control" required="required"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="comment">Idea taking closer date</label>
                        <input type="text" name="ideas_closer_date" value="" size="22" tabindex="1"
                               class="sm-form-control" id="closure_date"  required="required" />
                    </div>
                    <div class="form-group">
                        <label for="comment">Idea final closer date</label>
                        <input type="text" name="ideas_final_closer_date" value="" size="22" tabindex="1"
                               class="sm-form-control" id="final_closure_date"  required="required" />
                    </div>

                    <div class="clear"></div>

                    <div class="form-group nobottommargin">
                        <button name="submit" type="submit" id="submit-button" tabindex="5" value="Submit"
                                class="button button-3d nomargin">ADD
                        </button>
                    </div>
                </form>


                <div class="line"></div>


            </div><!-- #respond end -->
        </div>
</body>
</html>
            <?php
            } else {
                    include 'userLoginFirst.php';
            }

            include 'footer.php';
            }  ?>