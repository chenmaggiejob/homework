<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiffany Style Calendar</title>
    <style>
        .calendar {
            font-family: Arial, sans-serif;
            max-width: 300px;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            background-color: #d8e7f3; /* Tiffany blue */
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        #monthYear {
            font-size: 18px;
            font-weight: bold;
        }

        table {
            width: 100%;
        }

        th, td {
            padding: 5px;
            text-align: center;
        }

        .grayed {
            color: #ccc; /* Gray color for non-current month days */
        }
    </style>
</head>
<body>
    <div class="calendar">
        <div class="header">
            <form method="get">
                <button type="submit" name="prevMonth" value="1">&lt;</button>
                <h2 id="monthYear"><?php echo date('F Y'); ?></h2>
                <button type="submit" name="nextMonth" value="1">&gt;</button>
            </form>
        </div>
        <table>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
            <?php
                // Get month and year from URL or use current month and year
                if (isset($_GET['prevMonth'])) {
                    $currentMonth = date('n', strtotime('-1 month'));
                    $currentYear = date('Y', strtotime('-1 month'));
                } elseif (isset($_GET['nextMonth'])) {
                    $currentMonth = date('n', strtotime('+1 month'));
                    $currentYear = date('Y', strtotime('+1 month'));
                } else {
                    $currentMonth = date('n');
                    $currentYear = date('Y');
                }

                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
                $firstDayOfMonth = mktime(0, 0, 0, $currentMonth, 1, $currentYear);
                $firstDayOfWeek = date('w', $firstDayOfMonth);
                $dayOfWeek = 0;
                $dayOfMonth = 1;

                // Loop through each week
                for ($i = 0; $i < 6; $i++) {
                    echo "<tr>";
                    // Loop through each day of the week
                    for ($j = 0; $j < 7; $j++) {
                        if (($dayOfMonth == 1 && $j < $firstDayOfWeek) || $dayOfMonth > $daysInMonth) {
                            echo "<td class='grayed'>" . ($dayOfMonth > $daysInMonth ? $dayOfMonth - $daysInMonth : '') . "</td>";
                        } else {
                            echo "<td>" . $dayOfMonth . "</td>";
                            $dayOfMonth++;
                        }
                    }
                    echo "</tr>";
                    if ($dayOfMonth > $daysInMonth) {
                        break;
                    }
                }
            ?>
        </table>
    </div>
</body>
</html>
