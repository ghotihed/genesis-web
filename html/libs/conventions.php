<?php

class Convention {
    public string $name;
    public string $url;
    public string $location;
    public ?DateTime $start;
    public ?DateTime $end;

    function __construct($convention) {
        $this->name = $convention["name"];
        $this->url = $convention["url"];
        $this->location = $convention["location"];
        try {
            $this->start = new DateTime($convention["start"]);
        } catch (Exception) {
            $this->start = null;
        }
        try {
            $this->end = new DateTime($convention["end"]);
        } catch (Exception) {
            $this->end = null;
        }
    }

    static function cmp($a, $b): int {
        if ($a->start == $b->start) {
            return 0;
        }
        return ($a->start < $b->start) ? -1 : 1;
    }

    function print(): void {
        echo "<tr>";
        echo "<td class='conventions-list-name'><a href='" . $this->url . "' target='_blank'>" . $this->name . "</a></td>";
        echo "<td class='conventions-list-location'>" . $this->location . "</td>";
        if (!is_null($this->start) && !is_null($this->end)) {
//            echo "<td class='conventions-list-dates-long'><span class='conventions-list-dates-start'>" . $this->start->format("j\<\s\u\p\>S\<\/\s\u\p\> F Y") . "</span> <span class='conventions-list-dates-to'>to</span> <span class='conventions-list-dates-end'>" . $this->end->format("j\<\s\u\p\>S\<\/\s\u\p\> F Y") . "</span></td>";
            echo "<td class='conventions-list-dates-long conventions-list-dates-start'>" . $this->start->format("j\<\s\u\p\>S\<\/\s\u\p\> F Y") . "</td>";
            echo "<td class='conventions-list-dates-long conventions-list-dates-to'>-</td>";
            echo "<td class='conventions-list-dates-long conventions-list-dates-end'>" . $this->end->format("j\<\s\u\p\>S\<\/\s\u\p\> F Y") . "</td>";

            echo "<td class='conventions-list-dates-short'><span class='conventions-list-dates-start'>" . $this->start->format("j-M-y") . "</span> <span class='conventions-list-dates-to'>-</span> <span class='conventions-list-dates-end'>" . $this->end->format("j-M-y") . "</span></td>";
//            echo "<td class='conventions-list-dates-short conventions-list-dates-start'>" . $this->start->format("j-M-y") . "</td>";
//            echo "<td class='conventions-list-dates-short conventions-list-dates-to'>-</td>";
//            echo "<td class='conventions-list-dates-short conventions-list-dates-end'>" . $this->end->format("j-M-y") . "</td>";
        } else {
            // Add empty <td/> elements here.
//            echo "<td class='conventions-list-dates-long'/>";
            echo "<td class='conventions-list-dates-long conventions-list-dates-start'/>";
            echo "<td class='conventions-list-dates-long conventions-list-dates-to'/>";
            echo "<td class='conventions-list-dates-long conventions-list-dates-end'/>";

            echo "<td class='conventions-list-dates-short'/>";
//            echo "<td class='conventions-list-dates-short conventions-list-dates-start'/>";
//            echo "<td class='conventions-list-dates-short conventions-list-dates-to'/>";
//            echo "<td class='conventions-list-dates-short conventions-list-dates-end'/>";
        }
        echo "</tr>";
    }
}

class Conventions {
    private array $data;
    private array $conventions;

    function __construct(string $filename = "") {
        if ($filename === "") {
            $filename = __DIR__ . "/../data/conventions.json";
        }
        $json = file_get_contents($filename);
        $this->data = json_decode($json, true);

        if (array_key_exists("conventions", $this->data)) {
            $this->conventions = [];
            foreach ($this->data["conventions"] as $convention_data) {
                $convention = new Convention($convention_data);
                $this->conventions[] = $convention;
            }
            usort($this->conventions, "Convention::cmp");
        }
    }

    function print(): void {
        $now = new DateTime();

        echo "<table class='conventions-list-table'>";
        foreach ($this->conventions as $convention) {
            $end = clone $convention->end;
            $end->add(new DateInterval("P1D"));
            if ($end > $now) {
                $convention->print();
            }
        }
        echo "</table>";
    }
}