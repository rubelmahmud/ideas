<?php include 'header.php'; ?>

    <!-- Content
            ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <!-- Comment Form
    ============================================= -->
            <div class="container" align="center">
                <div id="respond" class="clearfix">
                    <h3>Upload <span>FILES</span></h3>
                    <form class="clearfix" action="uploadZipFile.php" method="POST" id="idea_submit"
                          enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="file" name="file[]" multiple="multiple">
                        </>
                </div>
                <div class="form-group nobottommargin">
                    <button name="submit" type="submit" id="submit-button" tabindex="5" value="Upload"
                            class="button button-3d nomargin">UPLOAD
                    </button>
                </div>
                </form>
            </div>
    </section>


<?php include 'footer.php'; ?>