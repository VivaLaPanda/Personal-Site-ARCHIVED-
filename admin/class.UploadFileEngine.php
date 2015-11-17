<?php
class   UploadFileEngine
    {
        public  $errors;
        public  $fileName;

        private $target_dir;
        private $fileArray;
        private $fileTypes;
        private $target_file;

        public  function __construct($filetypes = array("jpg","jpeg","gif","png"))
            {
                // Assign accepted file types here
                $this->fileTypes    =   $filetypes;
                // Set the default input name from your form
                $this->setInput();
                // Set the errors array by default
                $this->errors       =   array();
            }

        public  function setDestination($target_dir = false, $make = true)
            {
                // Assign the destination
                $this->target_dir   =   $target_dir;
                // If the folder does not exist, try and make it
                if(!is_dir($this->target_dir) && $make)
                    mkdir($this->target_dir,0755,true);
                // Return this object for method-chaining purposes
                return $this;
            }

        public  function setInput($inputName = 'img_upload')
            {
                // Assign the input name (you can change this dynamically)
                $this->inputName    =   $inputName;
                $this->fileArray    =   (!empty($_FILES[$this->inputName]))? $_FILES[$this->inputName] : array();

                return $this;
            }

        public  function uploadFile()
            {
                // If there is no upload, just return false
                if(empty($this->fileArray))
                    return false;
                // Set up the file
                // This is all pretty much the same as yours...
                $this->fileName     =   basename($this->fileArray["name"]);
                $this->target_file  =   $this->target_dir.$this->fileName;
                $check              =   (!empty($this->fileArray["tmp_name"]))? getimagesize($this->fileArray["tmp_name"]) : false;
                $ext                =   pathinfo($this->target_file, PATHINFO_EXTENSION);

                if($check !== false) {
                        if(!file_exists($this->target_file)) {
                                if(in_array($ext, $this->fileTypes))
                                    return move_uploaded_file($this->fileArray["tmp_name"], $this->target_file);
                                else
                                    $this->errors[] =   'File extention invalid. Must be '.implode(", ",$this->fileTypes);
                            }
                        else
                            $this->errors[] =   'File already exists';
                    }
                else
                    $this->errors[] =   "File is not an image";

                return false;
            }

        public function getTargetFile()
            {
                return (!empty($this->target_file))? $this->target_file : false;
            }
    }