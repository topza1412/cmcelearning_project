<?php 

$funcNum = $_GET['CKEditorFuncNum'] ;

$file = strrchr($_FILES['upload']['name'], "."); //ตัดนามสกุลไฟล์เก็บไว้
$filename = (Date("dmy_His").$file); //ตั้งเป็น วันที่_เวลา.นามสกุล
$filesize = round($_FILES['upload']["size"] / 1024 / 1024, 1);

 //extensive suitability check before doing anything with the file...
    if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name'])) )
    {
       $message = "No file uploaded.";
    }

    else if ($_FILES['upload']["size"] == 0)
    {
       $message = "The file is of zero length.";
    }

    else if ($filesize > 2)
    {
       $message = "The file upload up to 2 mb.";
    }

    else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png") AND ($_FILES['upload']["type"] != "image/gif"))
    {
       $message = "The image must be in either GIF , JPG or PNG format. Please upload a JPG,PNG,GIF File instead.";
    }
    
	 else if (!is_uploaded_file($_FILES['upload']["tmp_name"]))
    {
       $message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
    }
    else {
      $message = "";

      $path = '../../../../upload/admin/file_upload_ckeditor/'.$filename;
	
      $move =  move_uploaded_file($_FILES['upload']['tmp_name'], $path);
      if(!$move)
      {
         $message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
      }
      //$url = "../" . $url;
    }

	
	if($message != "")
	{
		$url = "";
	}

  $url = 'http://cmcelearning.master/upload/admin/file_upload_ckeditor/'.$filename;

	echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";

?>