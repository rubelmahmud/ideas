<?php if(isset($_POST['upload']) && $_FILES['userfile']['size'] > 0)

{

        $fileName = $_FILES['userfile']['name'];

        $tmpName  = $_FILES['userfile']['tmp_name'];

        $fileSize = $_FILES['userfile']['size'];

        $fileType = $_FILES['userfile']['type'];

        $fp      = fopen($tmpName, 'r');

        $content = fread($fp, filesize($tmpName));

        $content = addslashes($content);

        fclose($fp);

        if(!get_magic_quotes_gpc())

        {

                $fileName = addslashes($fileName);

        }

        include 'connect-db.php';

        $sql = "INSERT INTO files (name, size, type, content ) ".

                "VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

        if ($conn->query($sql)) {

                echo "file uploaded";
        } else {
                echo "Error: " . $sql . "<br>" . $conn->error;

        }

}

?>
<form method="post" enctype="multipart/form-data">
        <table width="350" border="0" cellspacing="1" cellpadding="1">
                <tbody>
                <tr>
                        <td width="246">
                                <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />

                                <input id="userfile" type="file" name="userfile" /></td>
                        <td width="80"><input id="upload" type="submit" name="upload" value=" Upload " /></td>
                </tr>
                </tbody>
        </table>
</form>