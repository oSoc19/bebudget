<?php
    echo isset($error) ? '<div class="alert alert-danger col-12">' . $error . '</div>' : NULL;
    echo isset($success) ? '<div class="alert alert-success col-12">' . $success . '</div>' : NULL;
    $attributes = array('name' => 'upload-form');
    echo form_open_multipart('upload/do_upload', $attributes);
?>

    <input type="file" name="userfile" size="20" required="required"/>

    <div>
        <label>Year</label>
        <input type="text" name="year" required="required"/>
    </div>

    <input type="submit" value="Submit"/>

<?php echo form_close(); ?>