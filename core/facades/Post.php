<?php
    require "File.php";

    class Post 
    {
        public $template;
        public $blog;
        public $file;
        public $html;
        public function __construct($template, $blog) 
        {
            $this->template = $template;
            $this->blog = $blog;
            $this->file = new File();
        }
        public function fetchPage() 
        {
            $path = "../core/templates/" . $this->template . "/posts/post.html";
            $file = $this->file->readFile($path);
            $this->html = $file;
            return $file;
        }
        public function fetchMetaTitle($title = "") 
        {
            $string = "{{ page_title }}";
            $html = $this->html;
            if(strpos($this->html, $string)) {
                if(isset($title) && !empty($title)) {
                    $html = str_replace($string, $title, $html);
                } else {
                    $html = str_replace($string, "", $html);
                }
            }
            $this->html = $html;
        }
        public function fetchMetaDescription($description = "") {
            $string = "{{ page_description }}";
            $html = $this->html;
            if(strpos($this->html, $string)) {
                if(isset($description) && !empty($description)) {
                    $html = str_replace($string, $description, $html);
                } else {
                    $html = str_replace($string, "", $html);
                }
            }
            $this->html = $html;
        }
        public function fetchMetaKeywords($keywords = "") {
            $string = "{{ page_keywords }}";
            $html = $this->html;
            if(strpos($this->html, $string)) {
                if(isset($keywords) && !empty($keywords)) {
                    $html = str_replace($string, $keywords, $html);
                } else {
                    $html = str_replace($string, "", $html);
                }
            }
            $this->html = $html;
        }
        public function fetchPostImage($file) {
            $posts_folder = "../core/blogs/" . $this->blog . "/posts";
            if(!$this->file->checkFolder($posts_folder)) {
                $this->file->createFolder($posts_folder);
            }
            $file_name = $this->blog . date('dmyhis');
            $image = $this->file->upload($file, $posts_folder, $file_name);
            $imageTag = '<img src="./' . $image .'" alt="'. $image .'" />';

            $string = "{{ post_image }}";
            $html = $this->html;
            if(strpos($this->html, $string)) {
                if(isset($image) && !empty($image)) {
                    $html = str_replace($string, $imageTag, $html);
                } else {
                    $html = str_replace($string, "", $html);
                }
            }
            $this->html = $html;
            return $image;
        }
        public function fetchPostTitle($title = "") {
            $string = "{{ post_title }}";
            $html = $this->html;
            if(strpos($this->html, $string)) {
                if(isset($title) && !empty($title)) {
                    $html = str_replace($string, $title, $html);
                } else {
                    $html = str_replace($string, "", $html);
                }
            }
            $this->html = $html;
        }
        public function fetchPostContent($content = "") {
            $string = "{{ post_content }}";
            $html = $this->html;
            if(strpos($this->html, $string)) {
                if(isset($content) && !empty($content)) {
                    $html = str_replace($string, $content, $html);
                } else {
                    $html = str_replace($string, "", $html);
                }
            }
            $this->html = $html;
        }
        public function fetchDate() {
            $date = date('M d, Y');
            $string = "{{ post_date }}";
            $html = $this->html;
            if(strpos($this->html, $string)) {
                if(isset($date) && !empty($date)) {
                    $html = str_replace($string, $date, $html);
                } else {
                    $html = str_replace($string, "", $html);
                }
            }
            $this->html = $html;
        }
        public function createPage($url)
        {
            $page = $url.".html";
            $file_path = "../core/blogs/" . $this->blog . "/posts/" . $page;
            if(!$this->file->fileExists($file_path)) {
                $this->file->createFile($file_path);
            }
            $this->file->writeFile($file_path, $this->html);
            return $page;
        }
    }

?>