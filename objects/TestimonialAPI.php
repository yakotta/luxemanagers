<?php
class TestimonialAPI {
    static public function getTestimonialList()
    {
        $db = connect();
        $result = $db->query("select * from testimonials");
        return $result;
    }
}