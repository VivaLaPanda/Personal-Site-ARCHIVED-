<?php echo exec('whoami'); ?>
<?php
require (__DIR__.'/../secure/http_auth.php');
?>
<div ng-controller="MasterCtrl" id="primary">
    <div class="blog-wrapper">
        <form id="bpost_form" class="dropzone" method="post" action="/admin/writetofile.php" style="text-align:center" enctype="multipart/form-data">
            <input type="text" name="newpost_title"/>
            <br>
            <input type="file" name="img_upload" id="fileToUpload">
            <br>
            <textarea name="newpost_body" id="newpost" rows="10" cols="80">
                Lorum Ipsum is just something we say to keep ourselves warm at night.
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('newpost');
            </script>
            <input type="submit"
                   name="submit"
                   value="Save"/>
        </form>
    </div>
</div>

