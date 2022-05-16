<?php
    //Database credentials
    $user = "a30038517_joel";
    $pw = "Toiohomai1234";
    $db = "a30038517_scp";
    
    //Database connection
    $connection = new mysqli('localhost', $user, $pw, $db);
    
    //variable that returns all records in database
    $result = $connection->query("select * from scps");
    
    //check if form data has been sent via post
    if(isset($_POST['submit']))
    {
        //create variables from our form post data
        $item = $_POST['item'];
        $object = $_POST['object'];
        $image = $_POST ['image'];
        $containment = $_POST['containment'];
        $description = $_POST['description'];
        
        //create a sql insert command
        $insert = "insert into scps(item, object, image, containment, description) values('$item', '$object', '$image', '$containment', '$description')";
        
        if($connection->query($insert) === TRUE)
        {
            echo "
                <style>
                    body{font-family: sans-serif}
                    a {
                        background-color: black;
                        border: none;
                        color: white;
                        padding: 16px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Record added succesfully</h1>
                <p><a href='index.php'>Return to index page</a></p>
            ";
        }
        else
        {
            echo "
                <style>
                    body{font-family: sans-serif;}
                    a{
                        background-color: red;
                        border: none;
                        color: white;
                        padding: 16px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Error submitting data</h1>
                <p>{$connection->error}</p>
                <p><a href='form.php>Return to form</a></p>
            ";
        }
    }//end isset post
    
    if(isset($_POST['update']))
    {
        //create variables from our form post data
        $id = $_POST['id'];
        $item = $_POST['item'];
        $object = $_POST['object'];
        $image = $_POST ['image'];
        $containment = $_POST['containment'];
        $description = $_POST['description'];
        
        //create a sql update command
        $update = "update scps set item='$item', object='$object', containment='$containment', description='$description', image='$image' where id='$id'";
        
        if($connection->query($update) === TRUE)
        {
            echo "
                <style>
                    body{font-family: sans-serif}
                    a {
                        background-color: black;
                        border: none;
                        color: white;
                        padding: 16px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Record updated succesfully</h1>
                <p><a href='index.php'>Return to index page</a></p>
            ";
        }
        else
        {
            echo "
                <style>
                    body{font-family: sans-serif;}
                    a{
                        background-color: red;
                        border: none;
                        color: white;
                        padding: 16px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Error updating data</h1>
                <p>{$connection->error}</p>
                <p><a href='update.php>Return to form</a></p>
            ";
        }
    }//end isset post
    
    //delete record
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        
        //delete sql command
        $del = "delete from scps where id=$id";
        if($connection->query($del) === TRUE)
        {
            echo "
                <style>
                    body{font-family: sans-serif;}
                    a{
                        background-color: black;
                        border: none;
                        color: white;
                        padding: 16px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Record Deleted</h1>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
        else
        {
            echo "
                <style>
                    body{font-family: sans-serif;}
                    a{
                        background-color: red;
                        border: none;
                        color: white;
                        padding: 16px 32px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                    }
                </style>
                <h1>Error Deleting Record</h1>
                <p><a href='index.php'>Back to index page</a></p>
            ";
        }
    }
?>