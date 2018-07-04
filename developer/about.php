<?php

    class main{
        function __construct(){
        }

        public function run(){
            //read the list of files in the folder
            $meetingPaths = scandir("/home/cusdzern/public_html/documents/clipco meeting agendas/");
            $meetings = array();
            $count = count($meetingPaths);
            for($i = 0; $i < count($meetingPaths); $i++){
                $date = "";
                while(empty($date)){
                   $date = explode(".", $meetingPaths[$i])[0];
                   if(empty($date)){
                        $i++;
                   } 
                }
                
                $minutes = false;
                if (fopen("/home/cusdzern/public_html/documents/clipco meeting minutes/".$meetingPaths[$i],"r")) {
                    $minutes = true;
                }

                array_push($meetings,new meeting($date,$minutes));
            }

            $count = count($meetings);


            //format into panels
            $panels = array();
            for($i = 0; $i < count($meetings); $i++){
                
                $temp_meeting = $meetings[$i];
                $prev_meeting = null;
                if($i>0){
                     $prev_meeting = $meetings[$i-1];
                } else {
                    $prev_meeting = $temp_meeting;
                }
               
                //make a new panel every time there is an august entry
                if((intval($temp_meeting->getmonth()) == 8) || (intval($prev_meeting->getmonth()) == 5)){
                    array_push($panels, new panel($temp_meeting->getyear()));
                }
                //add meeting to panel
                $temp_panel = $panels[count($panels)-1];
                $temp_panel->pushMeeting($temp_meeting);
            }

            $htmlBody = "";
            for($i =0; $i < count($panels); $i++){
                $panel = $panels[$i];
                $htmlBody = $htmlBody . "<div class=\"panel panel-default\">\n";
                $htmlBody = $htmlBody . "   <div class=\"panel-heading\">\n";
                $htmlBody = $htmlBody . "       <h4 class=\"panel-title\"><a data-parent=\"#accordion\" data-toggle=\"collapse\" href=\"#collapse" . $i . "\">" . $panel->getHeading() . "</a></h4>\n";
                $htmlBody = $htmlBody . "   </div>\n";
                $htmlBody = $htmlBody . "  <div class=\"panel-collapse collapse\" id=\"collapse" . $i . "\">\n";
                $htmlBody = $htmlBody . "      <div class=\"panel-body\">\n";
                $htmlBody = $htmlBody . "           ".$panel->getBody();
                $htmlBody = $htmlBody . "       </div>\n";
                $htmlBody = $htmlBody . "   </div>\n";
                $htmlBody = $htmlBody . "</div>\n";
            }
            $file = fopen("/home/cusdzern/public_html/meeting_minutes_agendas.html", "w");
            fwrite($file, $htmlBody);
            fclose($file);
        }
    }


    class panel{

        private $heading = "";
        private $meetings = array();

        function __construct($_year) {
            $this->year = $_year;
            $this->heading = $this->year.'-'.($this->year+1)." Meetings";
        }

       

        function pushMeeting($meeting){
            array_push($this->meetings, $meeting);
        }

        function getBody(){
            $body = "";
            for($i = 0; $i < count($this->meetings); $i++){
                $temp_meeting = $this->meetings[$i];
                $body = $body .$temp_meeting->gettext();
                if($i < count($this->meetings)-1){
                    $body = $body . "<br>\n"; 
                } else{
                    $body = $body . "\n";
                }
            }
            return $body;
        }

        function getHeading(){return $this->heading;}
    }

    class meeting{

        private $day = "";
        private $month = "";
        private $year = "";
        private $body = "";
        private $date = "";
        private $minutes = false;

        public function __construct($_date, $_minutes){
            //initialize variables
            $this->date = $_date;
            $this->minutes = $_minutes;

            //separate date into day, month, year
            $this->day = explode("-", $this->date)[2];
            $this->month = explode("-", $this->date)[1];
            $this->year = explode("-", $this->date)[0];

            //set mintes and agenda into body, with links and s;
            $this->text = monthsConvert($this->month)." ".$this->day." meeting "."<a href=\"documents/clipco meeting agendas/".$this->date.".pdf\"> Agenda</a>/";
            if($this->minutes){
                $this->text = $this->text."<a href=\"documents/clipco meeting minutes/".$this->date.".pdf\">Minutes</a>";
            } else {
                $this->text = $this->text."Minutes";
            }
        }

        //get methods
        public function gettext(){return $this->text;}
        public function getday(){return $this->day;}
        public function getmonth(){return $this->month;}
        public function getyear(){return $this->year;}
    }

    function monthsConvert($month){
        $int_to_string = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $string_to_int = array("01" => "January", "02" => "February", "03" => "March", "04" => "April", "05" => "May", "06" => "June", "07" => "July", "08" => "August", "09" => "September", "10" => "October", "11" => "November", "12" => "December");
        if(is_int($month)){
            return $int_to_string[intval($month)-1];
        } elseif (is_string($month)) {
            return $string_to_int[$month];
        }
    }


/*
        <!-- just keeping this stuff for the format -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a data-parent="#accordion" data-toggle="collapse" href="#collapse5">2017-2018 Meetings</a></h4>
            </div>

            <div class="panel-collapse collapse" id="collapse5">
                <div class="panel-body">
                    October 19 meeting Agenda/Minutes
                </div>
            </div>
        </div>
        <!-- end format stuff -->
*/

?>