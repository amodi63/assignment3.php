<?php
trait Loggable
{
    protected function log($message)
    {
        file_put_contents('log.txt', $message . PHP_EOL, FILE_APPEND);
    }
}
class Manager
{
    use Loggable;

    private $students = [];

    public function addStudent(Student $student)
    {
        $this->students[$student->getId()] = $student;
        $this->log("Added student: {$student->getName()} (ID: {$student->getId()})");
    }

    public function getStudentById($id)
    {
        return isset($this->students[$id]) ? $this->students[$id] : null;
    }

    public function updateStudent(Student $student)
    {
        $id = $student->getId();
        if (isset($this->students[$id])) {
            $this->students[$id] = $student;
            $this->log("Updated student: {$student->getName()} (ID: {$student->getId()})");
        }
    }

    public function deleteStudent(Student $student)
    {
        $id = $student->getId();
        if (isset($this->students[$id])) {
            unset($this->students[$id]);
            $this->log("Deleted student: {$student->getName()} (ID: {$student->getId()})");
        }
    }
}