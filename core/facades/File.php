<?php
    class File
    {
        public function getPath($folder)
        {
            $path = getcwd()."/".$folder;
            return $path;
        }
        public function checkFolder($folder)
        {
            $folder = $this->getPath($folder);
            return (is_dir($folder) && file_exists($folder));
        }
        public function folderExists($folder)
        {
            return (is_dir($folder) && file_exists($folder));
        }
        public function createFolder($folder)
        {
            if(!$this->checkFolder($folder))
            {
                $folder = $this->getPath($folder);
                mkdir($folder);
                return true;
            } else {
                return false;
            }
        }
        public function deleteFolder($dirPath) {
            $dirPath = $this->getPath($dirPath);
            if (! is_dir($dirPath)) {
                return false;
            }
            if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
                $dirPath .= '/';
            }
            $files = glob($dirPath . '*', GLOB_MARK);
            foreach ($files as $file) {
                if (is_dir($file)) {
                    self::deleteFolder($file);
                } else {
                    unlink($file);
                }
            }
            rmdir($dirPath);
            return true;
        }
        public function fileExists($file)
        {
            $file = $this->getPath($file);
            return file_exists($file);
        }
        public function createFile($file)
        {
            // $file = $this->getPath($file);
            $fl = fopen($file, "w");
            if($fl)
            {
                fclose($fl);
                return true;
            } else {
                return false;
            }
        }
        public function writeFile($file, $content)
        {
            // $file = $this->getPath($file);
            $fl = fopen($file, "w");
            if(fwrite($fl, $content))
            {
                fclose($fl);
                return true;
            } else {
                return false;
            }
        }
        public function readFile($file)
        {
            $file = $this->getPath($file);
            return file_get_contents($file);
        }
        public function deleteFile($file)
        {
            $file = $this->getPath($file);
            return unlink($file);
        }
        public function copyFolder($src, $dst) { 
            // $src = $this->getPath($src);
            // $dst = $this->getPath($dst);
            $dir = opendir($src); 
            @mkdir($dst); 
            while(false !== ( $file = readdir($dir)) ) { 
                if (( $file != '.' ) && ( $file != '..' )) { 
                    if ( is_dir($src . '/' . $file) ) { 
                        $this->copyFolder($src . '/' . $file,$dst . '/' . $file); 
                    } 
                    else { 
                        copy($src . '/' . $file,$dst . '/' . $file); 
                    } 
                } 
            } 
            closedir($dir); 
        }

        public function copyFile($src, $dst)
        {
            $src = $this->getPath($src);
            $dst = $this->getPath($dst);

            copy($src, $dst);
            return true;
        }
        public function upload($file, $path="", $name="")
        {
            $file_name = $file['name'];
            $file_size = $file['size'];
            $file_tmp = $file['tmp_name'];
            $file_type = $file['type'];
            $tmp = explode('.', $file_name);
            $file_ext = end($tmp);

            if(isset($name) && $name !== '')
            {
                $file_new_name = $name . "." . $file_ext;
            }
            else {
                $file_new_name = $file_name;
            }

            if(isset($path) && $path !== "")
            {
                $file_path = $path;
                if(!file_exists($file_path))
                {
                    mkdir($file_path, 0777);
                }
            }
            else {
                $file_path = "../core/templates/zip";
            }

            if(move_uploaded_file($file_tmp, $file_path."/".$file_new_name))
            {
                return $file_new_name;
            }
            else {
                return false;
            }
        }
    }
?>