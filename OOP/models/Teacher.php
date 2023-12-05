<?php

class Teacher extends User {
    public array $courses = [];

    public function getCoursesString() : string {
        return $this->getFullName() . " geeft de lessen: " . implode(", ", $this->courses);
    }
}