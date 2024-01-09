<?php

class Conventions
{
    private array $data;

    function __construct(string $filename = "") {
        if ($filename === "") {
            $filename = __DIR__ . "/../data/conventions.json";
        }
        $json = file_get_contents($filename);
        $this->data = json_decode($json, true);
    }

    function addRow($convention): void {
        echo "<tr>";
        echo "<td class='conventions-list-name'><a href='" . $convention["url"] . "' target='_blank'>" . $convention["name"] . "</a></td>";
        echo "<td class='conventions-list-location'>" . $convention["location"] . "</td>";
        try {
            $start = new DateTime($convention["start"]);
        } catch (Exception) {
            $start = null;
        }
        try {
            $end = new DateTime($convention["end"]);
        } catch (Exception) {
            $end = null;
        }
        if (!is_null($start) && !is_null($end)) {
            echo "<td class='conventions-list-dates-long'><i>" . $start->format("j\<\s\u\p\>S\<\/\s\u\p\> F Y") . "</i> <b>to</b> <i>" . $end->format("j\<\s\u\p\>S\<\/\s\u\p\> F Y") . "</i></td>";
            echo "<td class='conventions-list-dates-short'><i>" . $start->format("j-M-y") . "</i> <b>to</b> <i>" . $end->format("j-M-y") . "</i></td>";
        } else {
            // Add empty <td/> elements here.
            echo "<td class='conventions-list-dates-long'/><td class='conventions-list-dates-short'/>";
        }
        echo "</tr>";
    }

    function createTable(): void {
        if (array_key_exists("conventions", $this->data)) {
            $conventions = $this->data["conventions"];
            echo "<table class='conventions-list-table'>";
            foreach ($conventions as $convention) {
                $this->addRow($convention);
            }
            echo "</table>";
        }
    }
}