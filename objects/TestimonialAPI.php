<?php
class TestimonialAPI {
    static public function getTestimonialList()
    {
        $db = Database::connect();
        $result = $db->query("select * from testimonials");
        return $result;
    }
}