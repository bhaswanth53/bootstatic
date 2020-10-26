<?php

    class Blog
    {
        public $template;
        public $homepage;
        public $chunk;
        public $schema;
        public $posts;
        public $listing;
        public $head;
        public $foot;

        public function __construct($template, $homepage, $chunk)
        {
            $this->template = $template;
            $this->homepage = $homepage;
            $this->chunk = $chunk;
        }

        public function fetchData($schema, $posts)
        {
            $this->schema = $schema;
            $this->posts = (array) $posts;
        }

        public function fetchHeaderandFooter($head, $foot)
        {
            $this->head = $head;
            $this->foot = $foot;
        }

        private function chunkImageFilter($image_link, $chunk)
        {
            $string = "{{ post_image }}";
            if(strpos($chunk, $string)) {
                if(isset($image_link) && !empty($image_link)) {
                    $chunk = str_replace($string, $image_link, $chunk);
                } else {
                    $chunk = str_replace($string, "", $chunk);
                }
            }
            return $chunk;
        }

        private function chunkTitleFilter($title, $chunk)
        {
            $string = "{{ post_title }}";
            if(strpos($chunk, $string)) {
                if(isset($title) && !empty($title)) {
                    $chunk = str_replace($string, $title, $chunk);
                } else {
                    $chunk = str_replace($string, "", $chunk);
                }
            }
            return $chunk;
        }

        private function chunkDateFilter($date, $chunk)
        {
            $string = "{{ post_date }}";
            if(strpos($chunk, $string)) {
                if(isset($date) && !empty($date)) {
                    $chunk = str_replace($string, $date, $chunk);
                } else {
                    $chunk = str_replace($string, "", $chunk);
                }
            }
            return $chunk;
        }

        private function chunkContentFilter($content, $chunk)
        {
            $string = "{{ post_chunk_content }}";
            if(strpos($chunk, $string)) {
                if(isset($content) && !empty($content)) {
                    $chunk = str_replace($string, $content, $chunk);
                } else {
                    $chunk = str_replace($string, "", $chunk);
                }
            }
            return $chunk;
        }

        private function chunkLinkFilter($link, $chunk)
        {
            $string = "{{ post_link }}";
            if(strpos($chunk, $string)) {
                if(isset($link) && !empty($link)) {
                    $chunk = str_replace($string, $link, $chunk);
                } else {
                    $chunk = str_replace($string, "", $chunk);
                }
            }
            return $chunk;
        }

        public function fetchListing()
        {
            $chunk = $this->chunk;
            $posts = $this->posts;
            $listing = "";

            foreach($posts as $post)
            {
                $post = (array) $post;
                $data = $this->chunkImageFilter("./posts/" . $post['image'], $chunk);
                $data = $this->chunkTitleFilter($post['title'], $data);
                $date = date_create($post['date']);
                $data = $this->chunkDateFilter(date_format($date, 'd M, Y'), $data);
                $data = $this->chunkContentFilter($post['chunk'], $data);
                $data = $this->chunkLinkFilter("./posts/" . $post['page'], $data);
                $listing .= $data;
            }

            $this->listing = $listing;
        }
    }

?>