
<html>
    <head>
        <title>Home</title>

        <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>   

        <link rel="stylesheet" type="text/css" href="projectStyle.css">

        <?php

        include '../dbconnect.php';

        $conn = new mysqli($host, $username, $pass, $dbname);

        if ($conn->connect_error) {
            die("Connection Failed" . $conn->connect_error);
        } else {
            $sql = "SELECT * from section";
            $result = $conn->query($sql);
            $result2 = $conn->query($sql);
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
                <a href="/group1/homepage/index.php" id="homeButton" style="cursor: pointer;user-select: none;margin-left: 10px;">Home</a>
                <a onclick="openMenu1()" id="tutorialButton" style="cursor: pointer;user-select: none;margin-left: 10px;">Subjects</a>
                <div id="tutorialDiv" class="tutorialDiv">
                    <table class="navBarSubjectTable">
                        <?php
                        $rowsize = mysqli_num_rows($result);
                        for ($i = 1; $i <= $rowsize; $i++) {
                            echo "<tr>";

                            for ($j = 1; $j <= 5; $j++) {
                                $row = $result->fetch_assoc();
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
                <form action="/group1/admin/login/">
                    <input type="submit" value="Admin" />
                </form>
            </div>
        </div>    
        <div align="center" class="mainMenuBodyDiv">
            <table border="0" class="mainMenuBodyHeaderTable">
                <tr>
                    <td align="center">
                        <a class="mainMenuHeader">Java Tutorials</a>
                    </td>
                </tr>
            </table>
            <!-- Write Comments -->
            <table border="0" class="mainMenuBodyHeader2Table">
                <tr>
                    <td align="center">
                        <a class="mainMenuHeader2">
                            Java is a widely used object-oriented programming language and software platform that runs on billions of devices, 
                            including notebook computers, mobile devices, gaming consoles, medical devices and many others. 
                            The rules and syntax of Java are based on the C and C++ languages.
                        </a>
                    </td>
                </tr>
            </table>

            <table border="12" class="mainMenuBodyContentTable">
                <tr>
                    <th align="center" style="border: none; height: 10px;padding-top: 20;padding-bottom: 15px;">
                        <a class="mainMenuBodyContentTableHeader">
                            Subjects
                        </a>
                    </th>
                </tr>
                <tr>   
                    <td align="center" style="border: none;padding-bottom: 30">
                        <table border="5" class="mainMenuBodyContentTableInside">
                            <?php
                            $rowsize2 = mysqli_num_rows($result);
                            for ($i = 1; $i <= $rowsize2; $i++) {
                                echo "<tr>";

                                for ($j = 1; $j <= 5; $j++) {
                                    $row = $result2->fetch_assoc();
                                    if (empty($row)) {
                                        break;
                                    }
                                    echo "<td align='center' style='border: none;'> <a href='/group1/homepage/subject.php?subject=" . $row['Subject'] . "'>" . $row['Subject'] . "</a></td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </td>           
                </tr>
            </table>
        </div>
    </body>
</html>
