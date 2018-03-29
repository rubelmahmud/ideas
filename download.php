<?php
include 'header.php';

include 'connect-db.php';

if (isset($_GET['id'])) { // if id is set then get the file with the id from database

        $id = $_GET['id'];

        $query = "SELECT name, type, size, content FROM files WHERE id = $id";

        $result = mysqli_query($conn, $query) or die('Error, query failed');

        list($name, $type, $size, $content) =

                mysqli_fetch_array($result);

        header("Content-length: $size");

        header("Content-type: $type");

        header("Content-Disposition: attachment; filename=$name");

        echo $content;
        exit;

}

?>



<?php

$query = "SELECT id, name FROM files";

$result = mysqli_query($conn, $query) or die('Error, query failed');

if (mysqli_num_rows($result) == 0) {

        echo "Database is empty";

} else { ?>
<div class="container">
    <h2> Download File From MySQL </h2> <br>



                <div class="table-responsive">
                                <table class="table table-bordered nobottommargin">
                                        <thead>
                                        <tr>
                                                <th>No</th>
                                                <th>File</th>


                                        </tr>
                                        </thead>
        <?php while ($row = mysqli_fetch_array($result)) {
                        ?>

                    <tbody>
                    <tr>
                        <td>1</td>
                        <td><a href="download.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a></td>


                    </tr>
                    </tbody>


                        <?php

                }
}

 ?>
                                </table>
                </div>
    </div>
<?php include 'footer.php'; ?>


