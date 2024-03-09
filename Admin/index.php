<?php
    session_start();
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];
    if ($role != "admin") {
        header("Location: /group1/unauthorized.php");
        exit;
    }
?>
    <html>
        <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body class="body">
        <div class="menuBar">
            <h1 id="">
                <!-- here do a  -->
                Hello, <?php echo $_SESSION['name'];?>
                <a href="/group1/admin/quiz/" style="float: right;
                                margin-right: 40px;
                                color: white;
                                text-decoration: none;
                                font-size: 22px;
                                background: #68abc8;
                                padding: 5px;
                                border-radius: 6px;" 
                            class="quizPageReference">Edit Quizzes</a>
            </h1>
        </div>

        <div class="content">
            <ul class="editingArea" id="editingSectionArea">
                <div class="innerText" name="myForm">Edit Sections
                    <button id="sectionsBtn"></button> 
                </div>
                <ul class="dropDownMenu" id="sectionsMenu" hidden>
                    <div class="list">

                    <?php 
                        include '../dbconnect.php';

                        $conn = mysqli_connect($host, $username, $pass, $dbname);
                        if(!$conn){
                            die("connection failed");
                        }
                        else{
                    
                            $sql_q = "SELECT * FROM `Section`";
                            $result = $conn->query($sql_q);
                    
                            if ($result->num_rows > 0) 
                            {
                                while($row = $result->fetch_assoc()) {
                                    echo "
                            <li class=\"sectionContainer height69\" id=\"".$row['Section_id']."\"> 
                                <a href=\"remove.php?id=".$row['Section_id']."&value=section\" style=\"color: purple; padding: 0px; margin: 13px; font-size: 14px;\">Remove Section</a>
                                
                                <form class=\"subContainer height20\" method=\"POST\" action=\"edit.php?id=".$row['Section_id']."&value=subject\">
                                <div class=\"subjectValue\"><textarea type=\"text\" name=\"subj\" class=\"inputStyle\">".$row['Subject']."</textarea></div>
                                <div class=\"links\">
                                    <input type=\"submit\" class=\"submitInput\" value=\"Update\">
                                    <a class=\"paddingLeft\" href=\"remove.php?id=".$row['Section_id']."&value=subject\" style=\"color: purple;\">Remove</a>
                                </div>
                            </form>


                                <form class=\"subContainer height62\" method=\"POST\" action=\"edit.php?id=".$row['Section_id']."&value=content\">
                                <div class=\"contentValue\"><textarea type=\"text\" name=\"cont\" class=\"inputStyle\">".$row['Content']."</textarea></div>
                                    <div class=\"links\">
                                        <input type=\"submit\" class=\"submitInput\" value=\"Update\">
                                        <a class=\"paddingLeft\" href=\"remove.php?id=".$row['Section_id']."&value=content\" style=\"color: purple;\">Remove</a>
                                    </div>
                                </form>
                                    
                            </li>";
                                    
                                }
                            }
                        }
                    ?>
                       
                    </div>
                </ul>
            </ul>
            
            <ul class="editingArea" id="addingSectionsArea">

                <div class="innerText" name="myForm">Add Section
                    <button id="addSectionsBtn"></button>
                </div>

                    <ul class="dropDownMenu" id="addingSectionsMenu" hidden>
                        <div class="list">
                            <li class="sectionContainer height85" id="1"> 

                            <form method="POST" action="add.php">
                                <div class="subContainer height20">

                                    <div class="addSectionSubj"><textarea type="text" name="addsubject" class="inputStyle" placeholder="New Subject..."></textarea></div>
                                    
                                </div>

                                    <div class="subContainer height71">
                                        <div contentEditable="true" class="addContentValue">
                                            <textarea type="text" name="addcontent" class="inputStyle" placeholder="New Content..."></textarea>
                                        </div>
                                    </div>
                                </li>
                                <input type="submit" value="Add" class="addSubmitButton"></a>
                            </form>

                        </div>
                    </ul>
            </div>
    </body>
        

    <script>

       
        let switch1 = false;
        let switch2 = false;
        
        document.getElementById("addSectionsBtn").addEventListener("click", function(e) {
            switch2 = !switch2;
            let sectionsArea = document.getElementById("addingSectionsArea");
            let c = document.getElementById("addingSectionsMenu");
            let body = document.querySelector(".body");
        
        if(switch1 && switch2) {
            body.style.height = "150vh";
        } 
        else {
            body.style.height = "100vh";

        }
            if (switch2) {
                c.removeAttribute("hidden");
                
            }
            else {
                sectionsArea.style.margin= "auto";
                sectionsArea.style.marginTop = "45px";
                
                c.setAttribute("hidden", true);
            }
        })
        
        document.getElementById("sectionsBtn").addEventListener("click", function(e) {
            switch1 = !switch1;
            let sectionsArea = document.getElementById("editingSectionArea");
            let c = document.getElementById("sectionsMenu");
            let body = document.querySelector(".body");
        
        if(switch1 && switch2) {
            body.style.height = "150vh";
        } 
        else {
            body.style.height = "100vh";

        }
            if (switch1) {
                sectionsArea.style.marginBottom = "400px";
                c.removeAttribute("hidden");
            }
            else {
                sectionsArea.style.margin= "auto";
                sectionsArea.style.marginTop = "45px";
                
                c.setAttribute("hidden", true);
            }
        })

    </script>
</html>