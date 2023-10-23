<!DOCTYPE html>
<html>
<head>
    <title>Upišite željenu riječ</title>
</head>
<body>
    <h2>Upišite željenu riječ</h2>
    <form method="post">
        <label for="word">Unos:</label>
        <input type="text" id="word" name="word" required>
        <input type="submit" value="Pošalji">
    </form>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>Riječ</th>
                <th>Broj slova</th>
                <th>Broj samoglasnika</th>
                <th>Broj suglasnika</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $word = trim($_POST['word']);
                if (!empty($word)) {
                    $analysis = analyzeWord($word);
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($word) . '</td>';
                    echo '<td>' . $analysis['Broj slova'] . '</td>';
                    echo '<td>' . $analysis['Broj samoglasnika'] . '</td>';
                    echo '<td>' . $analysis['Broj suglasnika'] . '</td>';
                    echo '</tr>';
            
                    
                    saveToJSON($word);
                }
                header("Location: {$_SERVER['REQUEST_URI']}");
                exit;
            }
            

            function analyzeWord($word) {
                $samoglasnik = preg_match_all('/[aeiouAEIOU]/', $word);
                $suglasnik = strlen($word) - $samoglasnik;
                return [
                    'Broj slova' => strlen($word),
                    'Broj samoglasnika' => $samoglasnik,
                    'Broj suglasnika' => $suglasnik,
                ];
            }

            function saveToJSON($word) {
                $words = json_decode(file_get_contents('words.json'), true);
                $words[] = $word;
                file_put_contents('words.json', json_encode($words));
            }

            $savedWords = json_decode(file_get_contents('words.json'), true);
            foreach ($savedWords as $savedWord) {
                $analysis = analyzeWord($savedWord);
                echo '<tr>';
                echo '<td>' . htmlspecialchars($savedWord) . '</td>';
                echo '<td>' . $analysis['Broj slova'] . '</td>';
                echo '<td>' . $analysis['Broj samoglasnika'] . '</td>';
                echo '<td>' . $analysis['Broj suglasnika'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
