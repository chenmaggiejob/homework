<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiffany Style Calendar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #81D8D0;
            margin: 0;
            padding: 20px;
        }
        .calendar {
            max-width: 600px;
            margin: 0 auto;
            background-color: #F0FFFF;
            border-radius: 10px;
            padding: 20px;
        }
        table {
            width: 100%;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #00CED1;
            color: white;
        }
        td {
            background-color: #E0FFFF;
        }
        .prev, .next {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00CED1;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .gray {
            color: gray;
        }
    </style>
</head>
<body>
    <?php
        // Get current month and year
        $month = isset($_GET['month']) ? $_GET['month'] : date('n');
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

        // Get the first day of the month
        $firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);

        // Get the number of days in the month
        $daysInMonth = date('t', $firstDayOfMonth);

        // Get the name of the month
        $monthName = date('F', $firstDayOfMonth);

        // Get the day of the week the first day of the month falls on
        $firstDayOfWeek = date('N', $firstDayOfMonth);

        // Create a table for the calendar
        echo '<div class="calendar">';
        echo '<a class="prev" href="?month=' . ($month == 1 ? 12 : $month - 1) . '&year=' . ($month == 1 ? $year - 1 : $year) . '">Previous Month</a>';
        echo '<a class="next" href="?month=' . ($month == 12 ? 1 : $month + 1) . '&year=' . ($month == 12 ? $year + 1 : $year) . '">Next Month</a>';
        echo '<h2>' . $monthName . ' ' . $year . '</h2>';
        echo '<table>';
        echo '<tr>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
                <th>Sun</th>
              </tr>';
        
        // Create rows for each week in the month
        echo '<tr>';
        $dayOfWeek = 1;
        // Add empty cells for days before the first day of the month
        for ($i = 1; $i < $firstDayOfWeek; $i++) {
            echo '<td class="gray"></td>';
            $dayOfWeek++;
        }
        // Add cells for each day in the month
        for ($day = 1; $day <= $daysInMonth; $day++) {
            if ($dayOfWeek == 1) {
                echo '</tr><tr>';
            }
            if ($day == date('j') && $month == date('n') && $year == date('Y')) {
                echo '<td>' . $day . '</td>';
            } else {
                echo '<td class="gray">' . $day . '</td>';
            }
            // Start a new row if it's the end of the week
            if ($dayOfWeek == 7) {
                echo '</tr>';
                $dayOfWeek = 1;
            } else {
                $dayOfWeek++;
            }
        }
        // Add empty cells for days after the last day of the month
        while ($dayOfWeek <= 7) {
            echo '<td class="gray"></td>';
            $dayOfWeek++;
        }
        echo '</tr>';
        echo '</table>';
        echo '</div>';
    ?>
</body>
</html>
