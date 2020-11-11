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
                    $image = '<img src="'.$image_link.'" alt="'.$image_link.'" />';
                    $chunk = str_replace($string, $image, $chunk);
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

            //foreach($posts as $post)
            for($i = count($posts)-1; $i >= 0; $i--)
            {
                $post = $posts[$i];
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

        private function blogTitleFilter($title)
        {
            $string = "{{ blog_title }}";
            $chunk = $this->homepage;
            if(strpos($chunk, $string)) {
                if(isset($title) && !empty($title)) {
                    $chunk = str_replace($string, $title, $chunk);
                } else {
                    $chunk = str_replace($string, "", $chunk);
                }
            }
            $this->homepage = $chunk;
        }

        private function blogDescriptionFilter($desc)
        {
            $string = "{{ blog_description }}";
            $chunk = $this->homepage;
            if(strpos($chunk, $string)) {
                if(isset($desc) && !empty($desc)) {
                    $chunk = str_replace($string, $desc, $chunk);
                } else {
                    $chunk = str_replace($string, "", $chunk);
                }
            }
            $this->homepage = $chunk;
        }

        private function blogKeywordsFilter($keywords)
        {
            $string = "{{ blog_keywords }}";
            $chunk = $this->homepage;
            if(strpos($chunk, $string)) {
                if(isset($keywords) && !empty($keywords)) {
                    $chunk = str_replace($string, $keywords, $chunk);
                } else {
                    $chunk = str_replace($string, "", $chunk);
                }
            }
            $this->homepage = $chunk;
        }

        private function blogHeadFilter($head)
        {
            $string = "{{ blog_head }}";
            $chunk = $this->homepage;
            if(strpos($chunk, $string)) {
                if(isset($head) && !empty($head)) {
                    $chunk = str_replace($string, $head, $chunk);
                } else {
                    $chunk = str_replace($string, "", $chunk);
                }
            }
            $this->homepage = $chunk;
        }

        private function blogListingFilter($listing)
        {
            $string = "{{ post_listing }}";
            $chunk = $this->homepage;
            if(strpos($chunk, $string)) {
                if(isset($listing) && !empty($listing)) {
                    $chunk = str_replace($string, $listing, $chunk);
                } else {
                    $chunk = str_replace($string, "", $chunk);
                }
            }
            $this->homepage = $chunk;
        }

        private function blogFootFilter($foot)
        {
            $string = "{{ blog_foot }}";
            $chunk = $this->homepage;
            if(strpos($chunk, $string)) {
                if(isset($foot) && !empty($foot)) {
                    $chunk = str_replace($string, $foot, $chunk);
                } else {
                    $chunk = str_replace($string, "", $chunk);
                }
            }
            $this->homepage = $chunk;
        }

        public function getIndexPage()
        {
            $schema = $this->schema;
            $this->blogTitleFilter($schema['title']);
            $this->blogDescriptionFilter($schema['description']);
            $this->blogKeywordsFilter($schema['keywords']);
            $this->blogHeadFilter($this->head);
            $this->blogListingFilter($this->listing);
            $this->blogFootFilter($this->foot);

            return $this->homepage;
        }
    }

?>