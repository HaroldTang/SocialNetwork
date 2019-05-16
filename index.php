<?php

session_start();
include_once 'header.html';
include_once 'query.php';
$flag = 0;
if (isset($_GET['out'])) {
  if ($_GET['out']) {
    setcookie('uname', '', time() - 1);
    $flag = 1;
  }
}
if (isset($_GET['locationid'])) {
  $location_id = $_GET['locationid'];
}
if ($flag != 1) {
  $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
  if (isset($_COOKIE['uname'])) {
    $username = $_COOKIE['uname'];
  }
  list($user_info, $num_row, $post_num, $friend_num) = get_user_info($username);

  if ($num_row == 1) {
    echo "
    
    <body class = 'grad d-flex flex-column m-0'>
        
      <div class='navbar' id='navigate-bar' style='background-color: white; height: 80px;'>
        <div>
          <h1 style='display: inline-block;'> Student Social Network</h1>
        </div>
        <div>
          <div style='display: inline-block;'>
            <a class='text-muted' href='search.php?userid={$user_info['id']}'>
              <svg xmlns='http://www.w3.org/2000/svg' width='30' height='30' fill='none' stroke='currentColor'
                stroke-linecap='round' stroke-linejoin='round' stroke-width='2' class='mx-3' role='img'
                color=#2F58BE viewBox='0 0 24 24'>
                <title>Search</title>
                <circle cx='10.5' cy='10.5' r='7.5' />
                <path d='M21 21l-5.2-5.2' />
              </svg>
            </a>
          </div>
          <nav style='display: inline-block;'>
            <a href='index.php'>Home</a>&nbsp;

            <a href='post.php?username={$user_info['username']}'>Post</a>&nbsp;

            <a href='friend.php?userid={$user_info['id']}'>Friends</a>&nbsp;

            <a href ='profile.php?username={$user_info['username']}'>My Profile</a>&nbsp;
          </nav>
        </div>
      </div>
        
      <div class='row'>
        <div class='col-3 align-self-start' id='user-info'>
          <div class='col no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'
              style='background-color:#E9EFFA; opacity:0.82;height:400px; width:320px; margin: 15px;'>
            <div class='row'>
              <div class ='container-fluid' style='padding-right: 0px'>
                <a class = 'btn btn-primary btn-sm float-right' href='index.php?out=1' role='button'>logout</a>
              </div>
            </div>
            <div id='user_name' class= 'container-fluid'>
              <h1 style = 'vertical-align:middle; text-align:center; margin:15px; color:#2B5F75'>{$user_info['username']} </h1>
            </div>
            <div id='edit_profile' class='container-fluid'>
              <a href ='profile.php?username={$user_info['username']}' style = 'text-align:center;display:block;font-size:15px'>Edit</a>
            </div>
            <div id='user_post&friend' class = 'row' style='margin:20px'>
              <div class = 'col' style = 'text-align:center'>
                <a style='font-size: 20px;' href='post.php?username={$user_info['username']}'>Post</a>
                <h3 style = 'color:blue'>{$post_num['count']}</h3>
              </div>
              <div class = 'col' style = 'text-align:center'>
                <a style='font-size: 20px;' href='friend.php?userid={$user_info['id']}'> Friends </a>
                <h3 style = 'color:blue; text-align:center' > {$friend_num['count']}</h3>
              </div>
            </div>
            <div id='user_background' style='margin:20px;text-align: left'>
              <div>
                <p style='font-size: 20px;color:#4173D9; display:inline'> Age:&nbsp;&nbsp;</p><p style='font-size: 20px; display:inline'>{$user_info['age']} </p>
              </div>
              <div>
                <p style='font-size: 20px;color:#4173D9;display:inline'> Live in: &nbsp;&nbsp;</p><p style='font-size: 20px; display:inline'>{$user_info['city']} </p>
              </div>
              <div>
                <p style='font-size: 20px;color:#4173D9;display:inline'> Real Name: &nbsp;</p><p style='font-size: 20px; display:inline'>{$user_info['real_name']} </p>
              </div>
            </div>
            <div>

            </div>
          </div>
        </div>
        <div class= 'col-6' id = 'center-content' style='width:700px'>
          <div style = 'margin-left: 0px; margin-right: 0px; margin-top:15px;background-color:#E8EDF7' class = 'row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'>
            <div class = 'col'>
              <div style='padding-top:10px;padding-bottom:15px;padding-left: 25px;padding-right: 25px '>
                <form role='form' action='submit.php' method='POST' enctype='multipart/form-data'>
                  <div class= 'form-group'>
                    <h2>Publish</h2>
                    
                    <input type='hidden' name='action' value='publish'>
                    <input type='hidden' name='id' value='{$user_info['id']}'>";
    if (isset($location_id)) {
      echo "<input type='hidden' name='location_id' value='{$location_id}' ";
    }
    echo "
                    <label for='title' style='margin-bottom: 2px'>Title</label>
                    <input type='text' class='form-control' name = 'title' style='margin-bottom: 2px'></input>
                    <label for='text_content' style='margin-bottom: 2px'>Content</label>
                    <textarea class = 'form-control' rows='3' name = 'text_content'></textarea>
                  </div>
                  <div class='float-right'>
                    <div class='input-group'>
                      <div class= 'dropdown'>
                        <button type='button' class= 'btn dropdown-toggle' id='visibility_select' data-toggle='dropdown'>Visibility</button>
                        <div class='dropdown-menu m-1' style='padding-top:2px;padding-bottom: 2px'>
                          <div class='form-check' style='margin: 0px'>
                            <input class='from-check-input' type ='radio' name='visibility' value='1'>&nbsp;Friend of Mine</a> 
                            <input class='from-check-input' type ='radio' name='visibility' value='2'>&nbsp;Friend of Friend</a>                         
                            <input class='from-check-input' type ='radio' name='visibility' value='3'>&nbsp;All Users</a>
                          </div>
                        </div>
                      </div>
                      <label class='btn btn-secondary btn-sm float-right m-1'>
                        Browse File<input type='file'  id='file' name='uploadFile' hidden>
                      </label>
                      <label class='btn btn-info btn-sm float-right m-1' data-toggle='modal' data-target='#modalLocation'>
                        Select Location 
                      </label>
                      <div class='float-right'>
                        <button type='submit' class = 'btn btn-primary btn-sm m-1'>Submit</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class= 'container-fluid' style='border-bottom-style:solid; border-width:2px; padding-top:10px; padding-bottom:5px'>
              <h2 style='color:#4173D9'>Recently Post</h2>
            </div>";
    $friend_post = mysqli_query($conn, "select id, post_user, title, text_content, post_time, photo_id, video_id, audio_id, location_id
            from post 
            where post_user in (select friend_id from relation where user_id = {$user_info['id']} and status = 'friend')
            union 
            select id, post_user, title, text_content, post_time, photo_id, video_id, audio_id, location_id
            from post
            where visibility > 1 and post_user in (select distinct friend_id from relation where status='friend' and user_id in (select friend_id from relation where user_id = {$user_info['id']} and status='friend'))
            union	
            select id, post_user, title, text_content, post_time, photo_id, video_id, audio_id, location_id
            from post
            where post_user = {$user_info['id']}
            order by post_time desc;");

    while ($post_content_result = mysqli_fetch_assoc($friend_post)) {
      $friend_name = mysqli_query($conn, "select username from user where id = {$post_content_result['post_user']}");
      $friend_name = mysqli_fetch_assoc($friend_name);
      $location_result = mysqli_query($conn, "select * from location where id = {$post_content_result['location_id']}");
      $location_flag = (true == $location_result);
      if ($location_flag){
        $location = mysqli_fetch_assoc($location_result);
      }
      $like_num = mysqli_query($conn, "select user_id from likepost where post_id = {$post_content_result['id']}");
      $like_num = mysqli_num_rows($like_num);
      $post_content = nl2br($post_content_result['text_content']);
      if ($location_flag){
      echo "
      <div class='modal fade' id='get_location' tabindex='-1' role='form' aria-hidden='true'>
          <div class='modal-dialog modal-dialog-centered' role='form'>
              <div class='modal-content'>
                  <div class='modal-header'>
                      <h5 class='modal-title'>Post location</h5>
                      <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                          <span aria-hidden='true'>&times;</span>
                      </button>
                  </div>
                      <div class='modal-body'>
                          <div class='container'>
                              <div class='col-10 align-self-center'>
                                  <P>Latitude: {$location['latitude']}</P>
                                  <P>Longitude: {$location['longitude']}</P>
                                  <p>Location Name: {$location['location_name']}</p>
                              </div>
                          </div>
                      </div>
                      <div class='modal-footer'>
                          <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                          <button type='submit' class='btn btn-primary'>Save changes</button>
                      </div>
              </div>
          </div>
  </div>";}
  echo "
            <div class='container-fluid p-4' style= 'border-bottom-style:solid;border-width: 1px'>
              <div class = 'col-12'>
                <div class = 'container p-0'>
                  <strong class = 'd-inline-block mb-2 text-primary'> Post By: <a href = 'friend.php?userid={$user_info['id']}&username={$friend_name['username']}' style='color:#4173D9'>{$friend_name['username']}</a></strong>
                  <div class='btn-group float-right'>
                    <form action='likepost.php' method='POST'>
                        <input type='hidden' name='userid' value='{$user_info['id']}'>
                        <input type='hidden' name='postid' value='{$post_content_result['id']}'>
                      <button type='submit' class='btn btn-light p-1' id= 'likebutton' aria-pressed = 'true' >{$like_num}
                      <svg t='1557620599600' class='icon' viewBox='0 0 1024 1024' version='1.1' xmlns='http://www.w3.org/2000/svg' p-id='10301' xmlns:xlink='http://www.w3.org/1999/xlink' width='30' height='30'><defs><style type='text/css'></style></defs><path d='M512 896c-6.4 0-16-3.2-22.4-9.6l-304-288-51.2-51.2C89.6 502.4 64 441.6 64 374.4s25.6-128 73.6-172.8S243.2 128 310.4 128s128 25.6 172.8 73.6L512 230.4l28.8-28.8c96-96 252.8-96 348.8 0 96 96 96 252.8 0 348.8l-51.2 51.2-300.8 288C528 892.8 521.6 896 512 896zM310.4 192c-48 0-92.8 19.2-128 54.4C147.2 281.6 128 326.4 128 374.4s19.2 92.8 54.4 128l51.2 51.2 281.6 265.6 278.4-265.6 51.2-51.2c70.4-70.4 70.4-185.6 0-256-70.4-70.4-185.6-70.4-256 0l-51.2 51.2c-12.8 12.8-32 12.8-44.8 0l-51.2-51.2C403.2 211.2 358.4 192 310.4 192z' p-id='10302' fill='#d81e06'></path></svg>
                      </button>
                    </form>
                    <button type='button' class= 'btn btn-light p-1' action='modal'>
                      <svg t='1557620647908' class='icon' viewBox='0 0 1024 1024' version='1.1' xmlns='http://www.w3.org/2000/svg' p-id='11358' xmlns:xlink='http://www.w3.org/1999/xlink' width='30' height='30'><defs><style type='text/css'></style></defs><path d='M891.072 64l-31.872 0L632.896 64 198.4 64 164.8 64 132.928 64C94.848 64 64 94.784 64 132.928l0 31.872 0 226.304 0 103.936 0 236.096 0 31.936C64 801.216 94.848 832 132.928 832l31.872 0L198.4 832l141.312 0 81.536 114.496C427.712 954.944 437.888 960 448.64 960c10.752 0 20.864-5.056 27.392-13.504L546.496 832l86.4 0 226.304 0 31.872 0C929.216 832 960 801.216 960 763.136l0-31.936 0-33.472L960 198.4 960 164.8 960 132.928C960 94.784 929.216 64 891.072 64zM227.392 256l569.28 0C816.128 257.664 832 270.336 832 289.792c0 19.648-15.872 34.176-35.392 34.176L227.392 323.968C207.872 323.968 192 309.44 192 289.792 192 270.336 207.872 257.664 227.392 256zM227.392 576C207.872 576 192 561.472 192 541.824c0-19.52 15.872-32.064 35.392-33.728l569.28 0C816.128 509.76 832 522.304 832 541.824 832 561.472 816.128 576 796.608 576L227.392 576z' p-id='11359' fill='#CDCDCD'></path></svg>
                    </button>
                    <div>";
                        if ($location_flag == 1){
                          echo "<button type='button' class= 'btn btn-light p-1' data-toggle='modal' data-target='#get_location'>
                              <svg t='1557764550856' class='icon' viewBox='0 0 1024 1024' version='1.1' xmlns='http://www.w3.org/2000/svg' p-id='1133' xmlns:xlink='http://www.w3.org/1999/xlink' width='30' height='30'><defs><style type='text/css'></style></defs><path d='M698.981453 181.327103c-136.411491-141.543848-357.561468-141.543848-493.972959 0-136.411491 141.565687-136.411491 371.102154 0 512.646002l246.98648 254.870653 246.986479-254.870653c136.411491-141.543848 136.411491-371.080314 0-512.646002zM451.994974 533.843574a109.17724 109.17724 0 0 1-109.155401-109.22092 109.19908 109.19908 0 0 1 109.155401-109.22092 109.19908 109.19908 0 0 1 109.1554 109.22092 109.19908 109.19908 0 0 1-109.1554 109.22092z' p-id='1134' fill='#1296db'></path></svg>
                            </button>";
                          }
                      echo "</div>
                  </div>
                </div>
                <h3 class = 'mb-3'>{$post_content_result['title']}</h3>
                <div class = 'mb-2 text-muted'> {$post_content_result['post_time']}</div>
                <p class = 'card-text mb-auto' style='font-size: 18px'> $post_content </p>
              </div>
              <div class='col-8 float-right'>";
      if (!is_null($post_content_result['photo_id'])) {
        $result = mysqli_query($conn, "select photo_type, photo_path from photo where id={$post_content_result['photo_id']}");
        $row = mysqli_fetch_array($result);
        echo "<img width='500' src='{$row["photo_path"]}'/>";
      } else if (!is_null($post_content_result['audio_id'])) {
        $result = mysqli_query($conn, "select audio_type, audio_path from audio where id={$post_content_result['audio_id']}");
        $row = mysqli_fetch_array($result);
        echo "<audio width='500'  controls = 'controls' preload='auto'>
                    <source src='{$row["audio_path"]}'>
                    </audio>";
      } else if (!is_null($post_content_result['video_id'])) {
        $result = mysqli_query($conn, "select video_type, video_path from video where id={$post_content_result['video_id']}");
        $row = mysqli_fetch_array($result);
        echo "<video width='500'  controls='controls' preload='auto'>
                    <source src='{$row["video_path"]}'>
                    </video>";
      }
      echo "  
              </div>
            </div>";
    }
    echo "
          </div>
        </div>
        <div class='col' style='width:200px; margin-top: 15px; margin-left: 20px; padding-left: 0px;padding-right:20px' id='sidebar' >
          <div style = 'background-color:#E8EDF7' class = 'row no-gutters border rounded overflow-hidden flex-md-row shadow-sm'>
            <div class= 'col' style='padding-top:10px;padding-bottom:0px;padding-left: 15px;'>
              <h3>Popular Location</h3>
              <!--Google Map-->
              <div id='map-container-google' class='z-depth-1-half map-container' style='width:400px;height:300px'>
                <script>

                  function myMap() {
                    var mapProp = {
                      center: new google.maps.LatLng(40.6939779, -73.9824903),
                      zoom: 14,
                    };
                    var map = new google.maps.Map(document.getElementById('googleMap'), mapProp);
                    var marker = new google.maps.Marker({
                      position: new google.maps.LatLng(40.6939779, -73.9824903),
                      icon: ''
                    });
                    marker.setMap(map);
                  }
                </script>
                <div id='googleMap' style='width:300px;height:300px;'></div>    
                <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCyPzGtpzD0J8eVsJf6k3kdlWDXxcD_GwI&callback=myMap'></script> 
              </div>
            </div>
              <div class='col'>
                <h3>User You May Know</h3>";
    $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
    $FOF = mysqli_query($conn, "select distinct friend_id from relation where status = 'friend' and user_id in (select friend_id from relation where user_id = {$user_info['id']} and status = 'friend')");
    if (0 != mysqli_fetch_row($FOF)) {
      while ($FOF_name = mysqli_fetch_assoc($FOF)) {
        $Friend_FOF_name = mysqli_query($conn, "select username from user where id={$FOF_name['friend_id']}");
        $FOF_result = mysqli_fetch_assoc($Friend_FOF_name);
        echo "<div class='flex-md-row'>
                    <a style='margin-left:100px;font-size:20px' href='friend.php?userid={$user_info['id']}&username={$FOF_result['username']}'>{$FOF_result['username']}</a>
                  </div>";
      }
    } else {
      echo "<div class='flex-md-row'>
      <h3>No recommendation</h3>
      </div>";
    }
    echo "
            </div>
            
                
            
            </div>
          </div>
        </div>
      </body>

    ";
  } else {
    echo "<script type = 'text/javascript'>
      window.location.href = 'index.php'
    </script>";
  }
} else {
  echo "<script type = 'text/javascript'> window.location.href = 'login.html' </script>";
}

include_once 'footer.html';