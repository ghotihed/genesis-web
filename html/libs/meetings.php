<?php

class Credentials {
    public string $url;
    public string $id;
    public string $pw;

    function __construct($credentials) {
        $this->url = $credentials["url"];
        $this->id = $credentials["id"];
        $this->pw = $credentials["pw"];
    }

    function show(): void {
        echo "<li><i>Join meeting:</i> <a href=\"" . $this->url . "\" target=\"_blank\">Click here</a></li>";
        echo "<li><i>Meeting ID:</i> " . $this->id . "</li>";
        echo "<li><i>Password:</i> " . $this->pw . "</li>";
    }
}

class Meeting {
    public string $name;
    public DateTime $date;
    public int $duration;
    public bool $international;
    public bool $cancelled;
    public array $info;
    public ?Credentials $credentials;

    function __construct($meeting, $prototype) {
        if ($prototype != null) {
            $this->name = $prototype->name;
            $this->duration = $prototype->duration;
            $this->international = $prototype->international;
            $this->cancelled = false;
            $this->info = $prototype->info;
            $this->credentials = $prototype->credentials;
        } else {
            $this->duration = 1;
            $this->international = true;
            $this->cancelled = false;
            $this->info = [];
            $this->credentials = null;
        }
        if (array_key_exists("name", $meeting)) {
            $this->name = $meeting["name"];
        }
        if (array_key_exists("date", $meeting)) {
            try {
                $this->date = new DateTime($meeting["date"], new DateTimeZone("Europe/London"));
            } catch (Exception) {
                $this->date = new DateTime("July 20, 1969 20:17 Europe/London");
            }
        } else {
            $this->date = new DateTime("July 20, 1969 20:17 Europe/London");
        }
        if (array_key_exists("duration", $meeting)) {
            $this->duration = $meeting["duration"];
        }
        if (array_key_exists("international", $meeting)) {
            $this->international = $meeting["international"];
        }
        if (array_key_exists("cancelled", $meeting)) {
            $this->cancelled = $meeting["cancelled"];
        }
        if (array_key_exists("info", $meeting)) {
            $this->info = $meeting["info"];
        }
        if (array_key_exists("credentials", $meeting)) {
            $this->credentials = new Credentials($meeting["credentials"]);
        }
    }

    static function cmp($a, $b): int {
        if ($a->date == $b->date) {
            return 0;
        }
        return ($a->date < $b->date) ? -1 : 1;
    }

    function print(): void {
        echo "<li>";
        $cancelled = $this->cancelled ? " cancelled" : "";
        echo "<span class='meeting-name$cancelled'>$this->name:</span> ";
        echo "<span class='meeting-date$cancelled'>";
        echo $this->date->format("l, j\<\s\u\p\>S\<\/\s\u\p\> F Y H:i T");
        echo "</span>";
        if ($this->international) {
            echo "<span class='meeting-date-international'>";
            $this->date->setTimezone(new DateTimeZone("America/Los_Angeles"));
            echo " (" . $this->date->format("H:i T");
            $this->date->setTimezone(new DateTimeZone("America/New_York"));
            echo " / " . $this->date->format("H:i T") . ")";
            echo "</span>";
        }
        echo "</li>";

        if (count($this->info) != 0 || $this->credentials != null) {
            echo "<ul>";

            foreach ($this->info as $info_line) {
                echo "<li><i>$info_line[0]:</i> $info_line[1]</li>";
            }

            $this->credentials?->show();

            echo "</ul>";
        }
    }
}

class Meetings
{
    private array $data;
    private array $meetings;

    function __construct(string $filename = "") {
        if ($filename === "") {
            $filename = __DIR__ . "/../data/meetings.json";
        }
        $json = file_get_contents($filename);
        $this->data = json_decode($json, true);

        $now = new DateTime();
        $this->meetings = [];
        if (array_key_exists("meetings", $this->data)) {
            foreach ($this->data["meetings"] as $meeting_entry) {
                $prototype = new Meeting($meeting_entry, null);
                foreach ($meeting_entry["dates"] as $entry) {
                    $meeting = new Meeting($entry, $prototype);
                    $end = clone $meeting->date;
                    $end->add(new DateInterval("PT{$meeting->duration}H"));
                    if ($end > $now) {
                        $this->meetings[] = $meeting;
                    }
                }
            }
        }
        usort($this->meetings, "Meeting::cmp");
    }

    function print(): void {
        $displayed = [];
        foreach ($this->meetings as $meeting) {
            if (!in_array($meeting->name, $displayed)) {
                $displayed[] = $meeting->name;
                $meeting->print();
            }
        }
    }
}