<html>
<body>
    <?php
        echo Form::open(array('url' => '/uploadfile','files' => 'true'));
        echo "Select the file to upload.";
        echo Form::filr('image');
        echo Form::submit('upload File');
        echo Form::close();
    ?>
</body>
</html>