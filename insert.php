<?php
    include("connection.php");

    if(  isset( $_GET["submit"]  ) )
    {   
        
        $f_name = trim($_GET["fname"]);
        $s_email = trim($_GET["email"]);
        $s_contact = trim($_GET["contact"]);
        $s_password = trim($_GET["password"]);
        $gender = trim($_GET["gender"]);
        $branch = trim($_GET["branch"]);

        $enc_password = password_hash($s_password , PASSWORD_DEFAULT   );

        $myQuery = $conn->prepare("INSERT INTO student(fullName, email, contact, password, gender,branch) VALUES(?,?,?,?,?,?)");

        $myQuery->bind_param("ssssss",$f_name,$s_email,$s_contact,$s_password,$gender,$branch);

        if( $myQuery->execute() == TRUE)
        {
            echo "
                <script type='text/javascript'>
                    alert('Data Inserted');
                    window.location.href='demoSelect.php';
                </script>
            ";
        }
        else
        {
            echo "
            <script type='text/javascript'>
                alert('Something went wrong');
                window.location.href='registration.html';
            </script>
            ";
        }
    }
    else
    {
        echo "
        <script type='text/javascript'>
            alert('Please fill the form');
            window.location.href='registration.html';
        </script>
        ";
    }
?>