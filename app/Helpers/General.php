<?php



function uploadImage($folder, $image)
{
    // $imgName = $image->getClientOriginalName();
    $ex = $image->getClientOriginalExtension();
    $newName = time() . '-' .'.'. $ex;
    $path = $image->move($folder, $newName);
    return $path;
}
