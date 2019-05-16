<?php
switch ($_POST['action']) {
    case 'location':
        $location_name = $_POST['location_name'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
        $stmt = $conn->prepare('insert into location (latitude,longitude,location_name) values (?,?,?)');
        $stmt->bind_param("dds", $latitude, $longitude, $location_name);
        $stmt->execute();
        $location_id = mysqli_insert_id($conn);
        $conn->close();
        echo "<script> alert('Location uploaded!');
        window.location = 'index.php?locationid=$location_id';
        </script>";
        break;

    case 'publish':
        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
        $title = $_POST['title'];
        $text_content = $_POST['text_content'];
        $visibility = $_POST['visibility'];
        $post_user = $_POST['id'];
        if (isset($_POST['location_id'])) {
            $location_id  = $_POST['location_id'];
            if (is_uploaded_file($_FILES['uploadFile']['tmp_name'])) {
                $storetype = $_FILES['uploadFile']['type'];
                $type = basename($_FILES['uploadFile']['type']);
                switch ($type) {
                    case 'jpeg':
                    case 'jpg':
                    case 'png':
                        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
                        move_uploaded_file(
                            $_FILES["uploadFile"]["tmp_name"],
                            "upload/" . $_FILES["uploadFile"]["name"]
                        );
                        $new_path = 'upload/' . $_FILES["uploadFile"]['name'];
                        $stmt = $conn->prepare('insert into photo (photo_type, photo_path) values (?,?)');
                        $stmt->bind_param("ss", $storetype, $new_path);
                        $stmt->execute();
                        $insertId = mysqli_insert_id($conn);
                        $stmt = $conn->prepare('insert into post (title,text_content,visibility,post_user, photo_id, location_id) values (?,?,?,?,?,?)');
                        $stmt->bind_param("ssiiii", $title, $text_content, $visibility, $post_user, $insertId, $location_id);
                        $stmt->execute();
                        echo " <script>alert('Post with a picture Published!');window.location ='index.php';</script>";
                        break;
                    case 'mp3':
                    case 'wav':
                    case 'flac':
                        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
                        move_uploaded_file(
                            $_FILES["uploadFile"]["tmp_name"],
                            "upload/" . $_FILES["uploadFile"]["name"]
                        );
                        $new_path = 'upload/' . $_FILES["uploadFile"]['name'];
                        $stmt = $conn->prepare('insert into audio (audio_type, audio_path) values (?,?)');
                        $stmt->bind_param("ss", $storetype, $new_path);
                        $stmt->execute();
                        $insertId = mysqli_insert_id($conn);
                        $stmt =  $conn->prepare('insert into post (title,text_content,visibility,post_user, audio_id, location_id) values (?,?,?,?,?,?)');
                        $stmt->bind_param("ssiiii",  $title,  $text_content,  $visibility,  $post_user,  $insertId, $location_id);
                        $stmt->execute();
                        echo " <script>alert('Post with a music Published!');window.location ='index.php';</script>";
                        break;
                    case 'mp4':
                    case 'avi':
                    case 'mov':
                        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
                        move_uploaded_file(
                            $_FILES["uploadFile"]["tmp_name"],
                            "upload/" . $_FILES["uploadFile"]["name"]
                        );
                        $new_path = 'upload/' . $_FILES["uploadFile"]['name'];
                        $stmt = $conn->prepare('insert into video (video_type, video_path) values (?,?)');
                        $stmt->bind_param("ss", $storetype, $new_path);
                        $stmt->execute();
                        $insertId = mysqli_insert_id($conn);
                        $stmt =  $conn->prepare('insert into post (title,text_content,visibility,post_user, video_id, location_id) values (?,?,?,?,?,?)');
                        $stmt->bind_param("ssiiii",  $title,  $text_content,  $visibility,  $post_user,  $insertId, $location_id);
                        $stmt->execute();
                        echo " <script>alert('Post with a video Published!');window.location ='index.php';</script>";
                        break;
                }
            } else {
                $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
                $stmt =  $conn->prepare('insert into post (title,text_content,visibility,post_user,location_id) values (?,?,?,?,?)');
                $stmt->bind_param("ssiii",  $title,  $text_content,  $visibility,  $post_user, $location_id);
                $stmt->execute();
                echo " <script>alert('Post Published!');window.location ='index.php';</script>";
                break;
            }
            $conn->close();
        } else {
            if (is_uploaded_file($_FILES['uploadFile']['tmp_name'])) {
                $type = basename($_FILES['uploadFile']['type']);
                $storetype = $_FILES['uploadFile']['type'];
                switch ($type) {
                    case 'jpeg':
                    case 'jpg':
                    case 'png':
                        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
                        move_uploaded_file(
                            $_FILES["uploadFile"]["tmp_name"],
                            "upload/" . $_FILES["uploadFile"]["name"]
                        );
                        $new_path = 'upload/' . $_FILES["uploadFile"]['name'];
                        $stmt = $conn->prepare('insert into photo (photo_type, photo_path) values (?,?)');
                        $stmt->bind_param("ss", $storetype, $new_path);

                        $stmt->execute();
                        $insertId = mysqli_insert_id($conn);
                        $stmt = $conn->prepare('insert into post (title,text_content,visibility,post_user, photo_id) values (?,?,?,?,?)');
                        $stmt->bind_param("ssiii", $title, $text_content, $visibility, $post_user, $insertId);
                        $stmt->execute();
                        echo " <script>alert('Post with a picture Published!');window.location ='index.php';</script>";
                        break;
                    case 'mp3':
                    case 'wav':
                    case 'flac':
                        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
                        move_uploaded_file(
                            $_FILES["uploadFile"]["tmp_name"],
                            "upload/" . $_FILES["uploadFile"]["name"]
                        );
                        $new_path = 'upload/' . $_FILES["uploadFile"]['name'];
                        $stmt = $conn->prepare('insert into audio (audio_type, audio_path) values (?,?)');
                        $stmt->bind_param("ss", $storetype, $new_path);
                        $stmt->execute();
                        $insertId = mysqli_insert_id($conn);
                        $stmt =  $conn->prepare('insert into post (title,text_content,visibility,post_user, audio_id) values (?,?,?,?,?)');
                        $stmt->bind_param("ssiii",  $title,  $text_content,  $visibility,  $post_user,  $insertId);
                        $stmt->execute();
                        echo " <script>alert('Post with a music Published!');window.location ='index.php';</script>";
                        break;
                    case 'mp4':
                    case 'avi':
                    case 'mov':
                        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
                        move_uploaded_file(
                            $_FILES["uploadFile"]["tmp_name"],
                            "upload/" . $_FILES["uploadFile"]["name"]
                        );
                        $new_path = 'upload/' . $_FILES["uploadFile"]['name'];
                        $stmt = $conn->prepare('insert into video (video_type, video_path) values (?,?)');
                        $stmt->bind_param("ss", $storetype, $new_path);
                        $stmt->execute();
                        $insertId = mysqli_insert_id($conn);
                        $stmt =  $conn->prepare('insert into post (title,text_content,visibility,post_user, video_id) values (?,?,?,?,?)');
                        $stmt->bind_param("ssiii",  $title,  $text_content,  $visibility,  $post_user,  $insertId);
                        $stmt->execute();
                        echo " <script>alert('Post with a video Published!');window.location ='index.php';</script>";
                        break;
                }
            } else {
                $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
                $stmt =  $conn->prepare('insert into post (title,text_content,visibility,post_user) values (?,?,?,?)');
                $stmt->bind_param("ssii",  $title,  $text_content,  $visibility,  $post_user);
                $stmt->execute();
                echo " <script>alert('Post Published!');window.location ='index.php';</script>";
                break;
            }
        }
        $conn->close();
        break;

    case 'edit_username':
        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
        $original_username =  $_POST['username'];
        $new_username =  $_POST['new_username'];
        $get_username =  " select username from user ";
        $all_username =  $conn->query($get_username);
        while ($row =  $all_username->fetch_assoc()) {
            if ($new_username ==  $row['username']) {
                echo "<script>alert('Invalid Username!');window.location='profile.php?username=$original_username';</script>";
            }
        }
        $stmt =  $conn->prepare(" update user set username = ? where username = '{$original_username}' ");
        $stmt->bind_param("s",  $new_username);
        $stmt->execute();
        echo "<script>alert('Username Change Successful! Please Login Again!');window.location='login.html';</script>";
        $conn->close();
        break;

    case 'edit_password':
        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
        $username =  $_POST['username'];
        $original_password =  $_POST['original_password'];
        $new_password1 =  $_POST['new_password'];
        $new_password2 =  $_POST['new_password_again'];
        if ($new_password1 !=  $new_password2) {
            echo "<script>alert('Reenter Password!');window.location='profile.php?username=$username';</script>";
        }
        $get_password =  " select password from user where username = '{$username}' ";
        $password_check =  $conn->query($get_password);
        $row =  $password_check->fetch_assoc();
        if ($original_password ==  $row['password'] &&  $new_password1 !=  $row['password']) {
            $stmt =  $conn->prepare(" update user set password = ? where username = '{$username}' ");
            $stmt->bind_param("s",  $new_password1);
            $stmt->execute();
            $conn->close();
            echo "<script>alert('Password Change Successful!');window.location='profile.php?username=$username';</script>";
        } else {
            echo "<script>alert('Invalid Password!');window.location = 'profile.php?username=$username';</script>";
        }
        break;

    case 'edit_age':
        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
        $username =  $_POST['username'];
        $new_age =  $_POST['new_age'];
        if ($new_age <= 0) {
            echo "<script>alert('Invalid Age!');window.location = 'profile.php?username=$username';</script>";
            break;
        }
        $stmt =  $conn->prepare(" update user set age = ? where username = '{$username}' ");
        $stmt->bind_param("i",  $new_age);
        $stmt->execute();
        echo "<script>alert('Age Change Successful!');window.location = 'profile.php?username=$username';</script>";
        $conn->close();
        break;

    case 'edit_city':
        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
        $username =  $_POST['username'];
        $city =  $_POST['city'];
        $stmt =  $conn->prepare(" update user set city = ? where username = '{$username}' ");
        $stmt->bind_param("s",  $city);
        $stmt->execute();
        echo "<script>alert('City Change Successful!');window.location='profile.php?username=$username';</script> ";
        $conn->close();
        break;

    case 'edit_real_name':
        $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
        $username =  $_POST['username'];
        $real_name =  $_POST['real_name'];
        $stmt =  $conn->prepare(" update user set real_name = ? where username = '{$username}' ");
        $stmt->bind_param("s",  $real_name);
        $stmt->execute();
        echo "<script>alert('Name Change Successful!');window.location = 'profile.php?username=$username';</script>";
        $conn->close();
        break;
    default:
        # code...
        break;
}
