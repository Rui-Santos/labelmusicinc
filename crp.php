<?php


class image{
  public static function crop($src, $target){

$image = imagecreatefromstring(file_get_contents($target."/".$src));
$filename = $src;

$thumb_width = 200;
$thumb_height = 150;
$small_width = 481;
$small_height = 320;
$medium_width = 768;
$medium_height = 481;
$large_width = 1281;
$large_height = 768;


$width = imagesx($image);
$height = imagesy($image);

$original_aspect = $width / $height;
$thumb_aspect = $thumb_width / $thumb_height;
$small_aspect = $small_width / $small_height;
$medium_aspect = $medium_width / $medium_height;
$max_aspect = $large_width / $large_height;


//resize for thumbnails
if ( $original_aspect >= $thumb_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_thumb_height = $thumb_height;
   $new_thumb_width = $width / ($height / $thumb_height);
}else{
   // If the thumbnail is wider than the image
   $new_thumb_width = $thumb_width;
   $new_thumb_height = $height / ($width / $thumb_width);
}


//resize for small pictures
if ( $original_aspect >= $small_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_small_height = $small_width;
   $new_small_width = $width / ($height / $small_width);
}else{
   // If the thumbnail is wider than the image
   $new_small_width = $small_height;
   $new_small_height = $height / ($width / $small_height);
}



//resize for medium pictures
if ( $original_aspect >= $medium_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_medium_height = $medium_height;
   $new_medium_width = $width / ($height / $medium_height);
}else{
   // If the thumbnail is wider than the image
   $new_medium_width = $medium_width;
   $new_medium_height = $height / ($width / $medium_width);
}


//resize for medium pictures
if ( $original_aspect >= $max_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_max_height = $large_height;
   $new_max_width = $width / ($height / $large_height);
}else{
   // If the thumbnail is wider than the image
   $new_max_width = $large_width;
   $new_max_height = $height / ($width / $large_width);
}




$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
$small = imagecreatetruecolor( $small_width, $small_height );
$medium = imagecreatetruecolor( $medium_width, $medium_height );
$max = imagecreatetruecolor( $large_width, $large_height );

// Resize and crop
imagecopyresampled($thumb,
                   $image,
                   0 - ($new_thumb_width - $thumb_width) / 2, // Center the image horizontally
                   0 - ($new_thumb_height - $thumb_height) / 2, // Center the image vertically
                   0, 0,
                   $new_thumb_width, $new_thumb_height,
                   $width, $height);
imagejpeg($thumb, $target."/thumb_".$filename, 80);

// Resize and crop
imagecopyresampled($small,
                   $image,
                   0 - ($new_small_width - $small_width) / 2, // Center the image horizontally
                   0 - ($new_small_height - $small_height) / 2, // Center the image vertically
                   0, 0,
                   $new_small_width, $new_small_height,
                   $width, $height);
imagejpeg($small, $target."/small_".$filename, 80);




if($width>$medium_width){
// Resize and crop
imagecopyresampled($medium,
                   $image,
                   0 - ($new_medium_width - $medium_width) / 2, // Center the image horizontally
                   0 - ($new_medium_height - $medium_height) / 2, // Center the image vertically
                   0, 0,
                   $new_medium_width, $new_medium_height,
                   $width, $height);
imagejpeg($medium, $target."/medium_".$filename, 80);




if($width>$large_width){
// Resize and crop
  imagecopyresampled($max,
                     $image,
                     0 - ($new_max_width - $large_width) / 2, // Center the image horizontally
                     0 - ($new_max_height - $large_height) / 2, // Center the image vertically
                     0, 0,
                     $new_max_width, $new_max_height,
                     $width, $height);
  imagejpeg($max, $target."/max_".$filename, 80);
}else{

// Resize and crop
imagecopyresampled($medium,
                   $image,
                   0 - ($new_medium_width - $medium_width) / 2, // Center the image horizontally
                   0 - ($new_medium_height - $medium_height) / 2, // Center the image vertically
                   0, 0,
                   $new_medium_width, $new_medium_height,
                   $width, $height);
imagejpeg($medium, $target."/max_".$filename, 80);



}

}else{
imagecopyresampled($small,
                   $image,
                   0 - ($new_small_width - $small_width) / 2, // Center the image horizontally
                   0 - ($new_small_height - $small_height) / 2, // Center the image vertically
                   0, 0,
                   $new_small_width, $new_small_height,
                   $width, $height);
imagejpeg($small, $target."/medium_".$filename, 80);
imagejpeg($small, $target."/max_".$filename, 80);
}





  }
}


if(isset($_GET['test'])){
$src_ = $_GET['src'];
$target_ = ".".$_GET['target'];

// print($target_."/".$src_);

image::crop($src_, $target_);

}


?>