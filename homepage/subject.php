
<html>
    <head>
        <title>
            <?php 
            $filename = basename($_SERVER['PHP_SELF'], ".php");
            echo "" . $filename . " Tutorial"; ?>
        </title>

        <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>

        <link rel="stylesheet" type="text/css" href="projectStyle.css">

        <?php
        
        include '../dbconnect.php';

        $conn = new mysqli($host, $username, $pass, $dbname);

        if ($conn->connect_error) {
            die("Connection Failed" . $conn->connect_error);
        } else {
            $sqlAllData = "SELECT * from section";
            $resultAllData = $conn->query($sqlAllData);
            $queries = array();
            parse_str($_SERVER["QUERY_STRING"], $queries);
            $sqlSubjectData = "SELECT * from section where Subject='" . $queries["subject"] . "'";

            $resultSubjectData = $conn->query($sqlSubjectData);
            $resultSubjectData2 = $conn->query($sqlSubjectData);
        }
        ?>

        <script>

            function openMenu1() {
                document.getElementById("tutorialDiv").classList.toggle("divDisplayToggle");
                document.getElementById("tutorialButton").classList.toggle("active");
            }

        </script>
    </head>
    <body style="background-color: #E4EFFF">

        <div class="topnavbar">
            <div style="margin-left: 75px;">          
                <a href="/group1/homepage/" id="homeButton" style="cursor: pointer;user-select: none;margin-left: 10px;">Home</a>
                <a onclick="openMenu1()" id="tutorialButton" style="cursor: pointer;user-select: none;margin-left: 10px;">Subjects</a>
                <div id="tutorialDiv" class="tutorialDiv">
                    <table class="navBarSubjectTable">
                        <?php
                        $rowsize = mysqli_num_rows($resultAllData) / 3;
                        for ($i = 1; $i <= $rowsize; $i++) {
                            echo "<tr>";

                            for ($j = 1; $j <= 5; $j++) {
                                $row = $resultAllData->fetch_assoc();

                                if (empty($row)) {
                                    break;
                                }
                                echo "<td align='center' style='border: none;'> <a href='/group1/homepage/subject.php?subject=" . $row['Subject'] . "'>" . $row['Subject'] . "</a></td>";                             
                            }
                            echo "</tr>";
                        }

                        ?>
                    </table>
                </div>
                <a href="/group1/quizzes/index.php" id="quizzesbutton" style="cursor: pointer; user-select: none;">Quizzes</a> 
                <a href="/group1/compiler/" id="compilerbutton" style="cursor: pointer; user-select: none;">Compiler</a>
                <form action="/group1/admin/login/" method="get">
                    <input type="submit" value=" Admin ">
                </form>
            </div>
        </div>    
        <div align="center" class="mainMenuBodyDiv">
            <table border="0" class="mainMenuBodyHeaderTable">
                <tr>
                    <td align="center">
                        <?php
                        while ($row = $resultSubjectData->fetch_assoc()) {
                            echo "<a class='mainMenuHeader'>" . $row['Subject'] . "</a>";
                        }
                        ?>

                    </td>
                </tr>
            </table>
            <table border="0" class="mainMenuBodyHeader2Table">
                <tr>
                    <td align="center">
                        <?php
                        while ($row = $resultSubjectData2->fetch_assoc()) {
                            echo "<a class='mainMenuHeader2'>" . $row['Content'] . "</a>";
                        }
                        ?>
                    </td>
                </tr>
            </table>         
        </div>
    </body>
</html>
