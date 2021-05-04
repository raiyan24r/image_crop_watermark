<?php












$attachmentLink = [];












      $croppedimg = cropImage($sentImage);





function cropImage($sentImage)
{



  $finalImage = imagecreatefromjpeg($sentImage);



  if (imagesy($finalImage) > 2.5 * imagesx($finalImage)) {
    $im2 = imagecrop($finalImage, ['x' => 0, 'y' => imagesy($finalImage) * 0.4, 'width' => imagesx($finalImage), 'height' => imagesy($finalImage) * 0.3]);
  } else if (imagesy($finalImage) > 2 * imagesx($finalImage)) {
    $im2 = imagecrop($finalImage, ['x' => 0, 'y' => imagesy($finalImage) * 0.3, 'width' => imagesx($finalImage), 'height' => imagesy($finalImage) * 0.4]);
  } else if (imagesy($finalImage) > 1.6 * imagesx($finalImage)) {
    $im2 = imagecrop($finalImage, ['x' => 0, 'y' => imagesy($finalImage) * 0.2, 'width' => imagesx($finalImage), 'height' => imagesy($finalImage) * 0.6]);
  } else if (imagesy($finalImage) > 1.4 * imagesx($finalImage)) {
    $im2 = imagecrop($finalImage, ['x' => 0, 'y' => imagesy($finalImage) * 0.15, 'width' => imagesx($finalImage), 'height' => imagesy($finalImage) * 0.7]);
  } else if (imagesy($finalImage) > 1.2 * imagesx($finalImage)) {
    $im2 = imagecrop($finalImage, ['x' => 0, 'y' => imagesy($finalImage) * 0.05, 'width' => imagesx($finalImage), 'height' => imagesy($finalImage) * 0.9]);
  } else $im2 = $finalImage;


  $cropped_img_black = imagecropauto($im2, IMG_CROP_THRESHOLD, 1, 0);
  $cropped_img_white = imagecropauto($cropped_img_black, IMG_CROP_THRESHOLD, 1, 16777215);



  imagepng($cropped_img_white, 'converted.png');



  return 'converted.png';
}