<?php 
    class Qcm{
      public $resultUser;
      public function __construct(){
        echo '<input type="submit" name="formSubmit" value="Envoyer">';
      }
      public function addQuestion($question){
        
      }
      public function setAppreciation($array){
        return $array;
      }
      public function generate(){
        if(isset($_POST['formSubmit']) and empty($_POST['formSubmit'])){
            echo "<div>Formulaire envoyé</div>";
          }
      }
      
    }
    class Question extends Qcm {
        public $name;
      
        public function __construct($name) {
          $this->name = $name;
          echo "<h2 class='question'>$this->name</h2>";
        }
        public function setExplanation($string){
          $this->string = $string;
          if(isset($_POST['formSubmit']) and !empty($_POST['formSubmit'])){
            echo '<div class="explanation"> '. $this->string . '</div>';
          }
          
        }
        public $answer;
        
          
        public function addAnswer($answer){
          
        }
      }
      class Answer extends Question{
        //const RIGHT_ANSWER = "";
        public function __construct($questionName, $answer, $boolean){
          
          $this->questionName = $questionName;
          $this->answer = $answer;
          if($boolean === true){
            $answerName =  "answerTrue";
        }
        elseif($boolean === false){
            $answerName =  "answerFalse";
        }
         
          echo '<div>         
                  <input type="radio" id="'.$this->answer.'" value="'.$answerName.'" name="'.$this->questionName.'">
                  <label for= "'.$this->answer.'">'.$this->answer.'</label>
                </div>';
          $resultUser = 0;
          if(isset($_POST['formSubmit'])){
            
            if(isset($_POST[$questionName]) and $_POST[$questionName] == "answerTrue" ){
              $resultUser = $resultUser +1;
            }
            elseif(isset($_POST[$questionName]) and $_POST[$questionName] == "answerFalse"){
              $resultUser = $resultUser;
            }
            echo "votre résultat est de " . $resultUser;
          }
        }
      
      }

?>