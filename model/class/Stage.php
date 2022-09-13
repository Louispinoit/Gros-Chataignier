<?php

class Stage extends Database
{
    
    public $query;
    
    public function __construct(?string $categories = null, ?string $description = null, ?string $date = null, ?string $starttime = null, ?string $endtime = null)

    {
        $this->categories = $categories;
        $this->description = $description;
        $this->date = $date;
        $this->starttime = $starttime;
        $this->endtime = $endtime;
    }

    
    /*      Verification des categories listé dans la bdd */
    public function getCategory()
    {
        $this->query = $this->prepare('SELECT * FROM categories');
        
    }

    /*     Ajout de stage dans la bonne catégorie */
    public function addStage()
    {
        if (!empty($this->categories) && !empty($this->description) && !empty($this->date) && !empty($this->starttime) && !empty($this->endtime)) {

            $params = [
                'users_id' => htmlentities($_SESSION['id']),
                'categories_id' => htmlentities($_POST["categories"]),
                'date' => htmlentities($_POST["date"]),
                'start_time' => htmlentities($_POST["start-time"]),
                'end_time' => htmlentities($_POST["end-time"]),
                'description' => htmlentities($_POST["description"]),
            ];
            $this->prepare('INSERT INTO stage_suggestion(users_id,categories_id, date, start_time, end_time, description) VALUES (:users_id, :categories_id, :date, :start_time, :end_time, :description)', $params);
            header('Location:index.php?posting=success');
        } else header('Location:index.php?posting=error');
    }
    
    
    /* envoi des stages disponible dans les pages correspondantes */
    public function stageFilter()
    {
        if ($_GET['page'] === "potager") {
            $currentChannel = 1;
        } else if ($_GET['page'] === "osiericulture") {
            $currentChannel = 2;
        } else if ($_GET['page'] === "vannerie") {
            $currentChannel = 3;
        } else if ($_GET['page'] === "fournil") {
            $currentChannel = 4;
        }
        $params = [
            ':currentchannel' => $currentChannel,
        ];
        $this->query = $this->prepare('SELECT date, start_time, end_time, description FROM stage_suggestion WHERE categories_id = :currentchannel LIMIT 5', $params);
        
    }
}
