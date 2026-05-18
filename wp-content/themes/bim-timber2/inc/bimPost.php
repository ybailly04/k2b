<?php
/**
 * Class BimPost
 */
class BimPost extends \Timber\Post
{

    protected $related_posts;
    
    /**
     * Gets related posts for that post object.
     *
     * @param string $mode "last", "type" or "select"
     * @return \Timber\PostQuery
     */
    public function related_posts($mode = "last", $cat = "", $articles = [])
    {

        // Return related posts early if we already loaded them.
        if (!empty($this->related_posts)) {
            return $this->related_posts;
        }

        if($mode === "last") {
            $this->related_posts = Timber::get_posts([
                'post_type'         => 'post',
                'posts_per_page'    => '8',
                'meta_key'          => 'date',
                'orderby'           => 'meta_value_num',
                'order'             => 'DESC',
                'post__not_in'      => [$this->ID],
            ]);
        }else if($mode === "type") {
            $this->related_posts = Timber::get_posts([
                'post_type'         => 'post',
				'posts_per_page'    => '8',
				'post__not_in'      => array($this->ID),
                'category__in'      => $cat,
                'meta_key'          => 'date',
                'orderby'           => 'meta_value_num',
                'order'             => 'DESC',
            ]);
        }else if($mode === "select") {
            $this->related_posts = Timber::get_posts([
                'post_type'         => 'post',
                'posts_per_page'    => '8',
				'post__not_in'      => array($this->ID),
				'post__in'          => $articles,
            ]);
        }

        return $this->related_posts;
    }
}

add_filter('timber/post/classmap', function ($classmap) {
    $custom_classmap = [
        'page' => BimPost::class,
        'post' => BimPost::class,
    ];

    return array_merge($classmap, $custom_classmap);
});