
<?php 
    if($_GET['status'])
    {
        //$data = file('/home/int322/secret/topsecret');   /* Getting mysql data from topsecret file */
        $uid = "root";
        $pw = "adminuser";          /* Initializing the file in different variables */
        $dbserver = "localhost";
        $dbname = "inandout";

        $connect = mysqli_connect($dbserver, $uid, $pw, $dbname) or die('Could not connect: ' . mysqli_error());

        if($_GET['status'] == "n")    /* If deleted is equal to 'n' it will update to 'y' or other way if the compiler try to change it */
        {
            echo $_GET['id'];
            $sql_update = "UPDATE emailus SET status='y' WHERE id='".$_GET['id']."'";
        }                                    
        else
        {        
            echo $_GET['id'];                          
            $sql_update = "UPDATE emailus SET status='n' WHERE id='".$_GET['id']."'";
        }         

        echo $sql_update;      /* print the value and run it*/

        $run = mysqli_query($connect, $sql_update) or die('query failed updating'. mysqli_error());

        mysqli_close($connect);   /* Close the file after updating it */
        header('Location: innout-manager.php');  /* after the if condition it will go to view.php page */
    }

    session_start();

    if($_GET['mgrcomment'] && $_GET['id'])
    {
        $uid = "root";
        $pw = "adminuser";          /* Initializing the file in different variables */
        $dbserver = "localhost";
        $dbname = "inandout";

        $connect = mysqli_connect($dbserver, $uid, $pw, $dbname) or die('Could not connect: ' . mysqli_error());

        $mgrcomment = trim($_GET['mgrcomment']);

        $sql_update = "UPDATE emailus SET mgr_comment='".$mgrcomment."' WHERE id='".$_GET['id']."'";

        echo $sql_update;      /* print the value and run it*/

        $run = mysqli_query($connect, $sql_update) or die('query failed updating'. mysqli_error());

        mysqli_close($connect);   /* Close the file after updating it */
        header('Location: innout-manager.php');  /* after the if condition it will go to view.php page */
    } 
?>