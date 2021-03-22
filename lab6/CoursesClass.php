<?php

class Course{
    public $code;
    public $name;
    public $ects;
    public $term;

    function __construct ($codigo, $nombre, $nota, $semestre){
        $this -> code = $codigo;
        $this -> name = $nombre;
        $this -> ects = $nota;
        $this -> term = $semestre;
    }

}


class CourseActions
{
    private $courselist;

    public function __construct($listacurso)
    {
        $this -> courselist = $listacurso;
    }
    private function Comparar($a, $b){
        $textA = str_replace(",", ".", $a->ects);
        $numA = floatval($textA);
        $textB = str_replace(",", ".", $b->ects);
        $numB = floatval($textB);
        if ($numA>=$numB){
            return -1;
        }
        else{
            return 1;
        }
    }
    public function filter($filtro)
    {
        $result = array();
        if ($filtro=="I00") {
            foreach ($this-> courselist as $valor => $curso) {
                if (is_numeric(substr($curso->code, 1))) {
                    $result[]=$curso;
                    
                }
            }
        }
        else {
            foreach ($this-> courselist as $valor => $curso) {
                if (substr($curso->code, 0, 3)== $filtro) //cuando es icd,...
                {
                    $result[]=$curso;
                }
            }
        }
        usort($result, array($this,"comparar"));//usando callback array index0 objeto index1 method name as a string
        return $result;
    }
}

function getCoursesTable(){
    $file = "./data/courses.csv";
    $arrCourse = array();

    if (($handle = fopen($file, "rb")) !== false) {
        while (($data = fgetcsv($handle, 1000, ";")) !== false) {
            $arrCourse[] = new Course($data[0], $data[1], $data[2], $data[3]);
            //echo "<p> $num fields in line $row: <br /></p>\n";
        /*foreach ($arrCourse as $values){
            printf("%s \t %s \t %s \t %s \t", $values->code, $values->name, $values->points, $values->semester);*/
        }
        

        fclose($handle);
    }
    
    
    
    if ($_POST["submit"]) {
            $esto=strtoupper($_POST["code"]);
            
            $filtro = new CourseActions($arrCourse);
            $arrCourse = $filtro -> filter($esto);
            return $arrCourse;
    }
    else{
        $filtro = new CourseActions($arrCourse);
        $arrCourse = $filtro -> filter("I00");
        return $arrCourse;
    }
    if ($_POST["reset"]) {
        $filtro = new CourseActions($arrCourse);
        $arrCourse = $filtro -> filter("I00");
        return $arrCourse;
    }
}






?>