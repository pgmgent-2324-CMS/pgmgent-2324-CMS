<?php

class Student extends User {
    public array $courses = [];

    public function getCoursesString() : string {
        return implode(", ", $this->courses);
    }
}