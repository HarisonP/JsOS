<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
 function deleteDirectory($dir) {
      if (!is_dir($dir) || is_link($dir)) return unlink($dir); 
          foreach (scandir($dir) as $file) { 
              if ($file == '.' || $file == '..') continue; 
              if (!destroy_dir($dir . DIRECTORY_SEPARATOR . $file)) { 
                  chmod($dir . DIRECTORY_SEPARATOR . $file, 0777); 
                  if (!destroy_dir($dir . DIRECTORY_SEPARATOR . $file)) return false; 
              }; 
          } 
          return rmdir($dir); 
  }
  function dirExists($dir)
  {
    return file_exists($dir) &&  is_dir($dir);
  }

  function isThereaValidFile()
  {
    $i=0;
    while(isset($_FILES["file".$i]))
    {
      if($_FILES["file".$i]["size"]!=0)
        return true;
      $i++;
    }
    return false;
  }
  $i=0;
  $validFiles=isThereaValidFile();
  $currentDir="./programs/".$_POST["programName"];
  if(dirExists("./".$currentDir))
  {
    $createProgram=0;
  }
  else
  {
    if($validFiles)
    {
    $createProgram=mkdir("./".$currentDir); 
     if($createProgram)  
     {
       while(isset($_FILES["file".$i]))
       {
        $okStatus=move_uploaded_file($_FILES["file".$i]["tmp_name"], $currentDir."/". $_FILES["file".$i]["name"]);
        if ($okStatus===0)
        {
        deleteDirectory("./".$currentDir);
        break;
        }
        $i++;
        }
      }
    }
  }
}

