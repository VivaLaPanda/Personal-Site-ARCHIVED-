<?php
$postbody = $_POST["newpost_body"];
$posttitle = $_POST["newpost_title"];
$filepath = dirname(__FILE__)."/../BlogPosts/";
$fileid = time();
$filename = $filepath . $fileid . ".html";
$var_str = var_export($postbody, true);
$var = "$postbody";
file_put_contents($filename, $var);

$posts = json_decode(file_get_contents(dirname(__FILE__)."/../BlogPosts/posts.json"), true);
#$posts->append($fileid);
$filedata = [
    "ID" => $fileid,
    "Title" => $posttitle,
    #TODO create summary code
    "Summary" => "null",
    "Thumb" => "null",
];

array_push($posts[posts], $filedata);

$arr1 = $posts ;
file_put_contents(dirname(__FILE__)."/../BlogPosts/posts.json",json_encode($arr1));
# array.json => {"a":1,"b":2,"c":3,"d":4,"e":5}


header('Location: /../index.html');