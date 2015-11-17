<?php

if (isset($_POST["submit"])) {
    include_once("class.UploadFileEngine.php");


    $destination = "../BlogPosts/post_images/";
    $uploader = new UploadFileEngine();
    $success = $uploader->setDestination($destination)
            ->uploadFile();

    $targetFile = $uploader->getTargetFile();
    if ($success) {
        #All other code
        $postbody = $_POST["newpost_body"];
        $posttitle = $_POST["newpost_title"];
#Preparing the post summary
        $postsummary = substr($postbody, 0, 175);
        $postsummary = $postsummary . "...";
        $postsummary = strip_tags($postsummary);
        $postsummary = preg_replace("/&quot;/", "\"", $postsummary);
        $postsummary = preg_replace("/&#39;/", "'", $postsummary);

#Uploading post text
        $filepath = dirname(__FILE__) . "/../BlogPosts/";
        $fileid = time();
        $filename = $filepath . $fileid . ".html";
        $var_str = var_export($postbody, true);
        $var = "$postbody";

#formatting post body
        $var = "<div ng-controller=\"MasterCtrl\" id=\"primary\">
    <div class=\"blog-wrapper\">
        <div class=\"header-box\">
            <img class=\"header-image\" src=\"$targetFile\" alt=\"$postsummary\">
        </div>
        <div class=\"title\">
            <h1>$posttitle</h1>
        </div>
        <div class=\"blog-subtitle\">
            <h5>" . gmdate("m.d.y", $fileid) . "</h5>
        </div>
        <div class=\"blog-body\">
            $var
        </div>
    </div>
</div>";


        file_put_contents($filename, $var);
        $posts = json_decode(file_get_contents(dirname(__FILE__) . "/../BlogPosts/posts.json"), true);
#$posts->append($fileid);
        $filedata = [
            "ID" => $fileid,
            "Title" => $posttitle,
            "Date" => gmdate("m.d.y", $fileid),
            "Summary" => $postsummary,
            "Thumb" => $targetFile,
        ];

        array_push($posts['posts'], $filedata);

        $arr1 = $posts;
        file_put_contents(dirname(__FILE__) . "/../BlogPosts/posts.json", json_encode($arr1));
# array.json => {"a":1,"b":2,"c":3,"d":4,"e":5}


        header('Location: #/blog');
    } else {
        echo implode('<br />', $uploader->errors);
    }
}
