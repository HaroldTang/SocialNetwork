<?php
include_once 'header.html';
include_once 'query.php';

$conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
$user_name = $_GET['username'];
list($user_info, $num_row) = get_user_info($user_name);


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
      </div>";

$conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
$query_result = mysqli_query($conn, "select * from post where post_user in (select id from user where username = '{$user_info['username']}') order by post_time desc");
$row = mysqli_fetch_row($query_result);

$conn->close();

echo " <div class='container-fluid'>
          <div class='col no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative'
              style='background-color:#E9EFFA; width:1000px; margin-left: 210px;margin-top: 15px'>
                <h2 style='color:#4173D9'>All Post from {$user_info['username']}</h2>";
while ($post_info = mysqli_fetch_assoc($query_result)) {
  $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
  $location_result = mysqli_query($conn, "select * from location where id = {$post_info['location_id']}");
  $location_flag = (true == $location_result);
  if ($location_flag){
    $location = mysqli_fetch_assoc($location_result);
  }
  $like_num = mysqli_query($conn, "select user_id from likepost where post_id = {$post_info['id']}");
  $like_num = mysqli_num_rows($like_num);
  $post_content = nl2br($post_info['text_content']);
  echo "<div class = 'col-12' style='border-bottom-style: dotted;margin-top:20px;margin-right: 0px;margin-left: 15px;'>
                      <div class = 'container p-0'>
                        <div class='btn-group float-right'>
                          <div>";
                            if ($location_flag == 1){
                              echo "<button type='button' class= 'btn btn-light p-1' data-toggle='modal' data-target='#get_location' >
                                  <svg t='1557764550856' class='icon' viewBox='0 0 1024 1024' version='1.1' xmlns='http://www.w3.org/2000/svg' p-id='1133' xmlns:xlink='http://www.w3.org/1999/xlink' width='30' height='30'><defs><style type='text/css'></style></defs><path d='M698.981453 181.327103c-136.411491-141.543848-357.561468-141.543848-493.972959 0-136.411491 141.565687-136.411491 371.102154 0 512.646002l246.98648 254.870653 246.986479-254.870653c136.411491-141.543848 136.411491-371.080314 0-512.646002zM451.994974 533.843574a109.17724 109.17724 0 0 1-109.155401-109.22092 109.19908 109.19908 0 0 1 109.155401-109.22092 109.19908 109.19908 0 0 1 109.1554 109.22092 109.19908 109.19908 0 0 1-109.1554 109.22092z' p-id='1134' fill='#1296db'></path></svg>
                                </button>";
                                
                              }
                          echo "</div>
                            <form action='likepost.php' method='POST'>
                                <input type='hidden' name='userid' value='{$user_info['id']}'>
                                <input type='hidden' name='postid' value='{$post_info['id']}'>
                              <button type='submit' class='btn btn-light p-1' id= 'likebutton' aria-pressed = 'true' >{$like_num}
                              <svg t='1557620599600' class='icon' viewBox='0 0 1024 1024' version='1.1' xmlns='http://www.w3.org/2000/svg' p-id='10301' xmlns:xlink='http://www.w3.org/1999/xlink' width='30' height='30'><defs><style type='text/css'></style></defs><path d='M512 896c-6.4 0-16-3.2-22.4-9.6l-304-288-51.2-51.2C89.6 502.4 64 441.6 64 374.4s25.6-128 73.6-172.8S243.2 128 310.4 128s128 25.6 172.8 73.6L512 230.4l28.8-28.8c96-96 252.8-96 348.8 0 96 96 96 252.8 0 348.8l-51.2 51.2-300.8 288C528 892.8 521.6 896 512 896zM310.4 192c-48 0-92.8 19.2-128 54.4C147.2 281.6 128 326.4 128 374.4s19.2 92.8 54.4 128l51.2 51.2 281.6 265.6 278.4-265.6 51.2-51.2c70.4-70.4 70.4-185.6 0-256-70.4-70.4-185.6-70.4-256 0l-51.2 51.2c-12.8 12.8-32 12.8-44.8 0l-51.2-51.2C403.2 211.2 358.4 192 310.4 192z' p-id='10302' fill='#d81e06'></path></svg>
                              </button>
                            </form>
                          <button type='button' class= 'btn btn-light p-1' action='modal'>
                            <svg t='1557620647908' class='icon' viewBox='0 0 1024 1024' version='1.1' xmlns='http://www.w3.org/2000/svg' p-id='11358' xmlns:xlink='http://www.w3.org/1999/xlink' width='30' height='30'><defs><style type='text/css'></style></defs><path d='M891.072 64l-31.872 0L632.896 64 198.4 64 164.8 64 132.928 64C94.848 64 64 94.784 64 132.928l0 31.872 0 226.304 0 103.936 0 236.096 0 31.936C64 801.216 94.848 832 132.928 832l31.872 0L198.4 832l141.312 0 81.536 114.496C427.712 954.944 437.888 960 448.64 960c10.752 0 20.864-5.056 27.392-13.504L546.496 832l86.4 0 226.304 0 31.872 0C929.216 832 960 801.216 960 763.136l0-31.936 0-33.472L960 198.4 960 164.8 960 132.928C960 94.784 929.216 64 891.072 64zM227.392 256l569.28 0C816.128 257.664 832 270.336 832 289.792c0 19.648-15.872 34.176-35.392 34.176L227.392 323.968C207.872 323.968 192 309.44 192 289.792 192 270.336 207.872 257.664 227.392 256zM227.392 576C207.872 576 192 561.472 192 541.824c0-19.52 15.872-32.064 35.392-33.728l569.28 0C816.128 509.76 832 522.304 832 541.824 832 561.472 816.128 576 796.608 576L227.392 576z' p-id='11359' fill='#CDCDCD'></path></svg>
                          </button>
                        </div>
                      </div>
                      <h3 class = 'mb-3'>{$post_info['title']}</h3>
                      <div class = 'mb-2 text-muted'> {$post_info['post_time']}</div>
                      <p class = 'card-text mb-auto' style='font-size: 18px'> $post_content </p>
                    
                    <div class='col-6'style='margin-left: 300px;margin-right:400px'>";
  if (!is_null($post_info['photo_id'])) {
    $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
    $result = mysqli_query($conn, "select photo_type, photo_path from photo where id={$post_info['photo_id']}");
    $row = mysqli_fetch_array($result);
    echo "<img src='{$row["photo_path"]}' width='500' />";
  } else if (!is_null($post_info['audio_id'])) {
    $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
    $result = mysqli_query($conn, "select audio_type, audio_path from audio where id={$post_info['audio_id']}");
    $row = mysqli_fetch_array($result);
    echo "<audio width='500'  controls = 'controls' preload='auto'>
                                  <source src='{$row["audio_path"]}'>
                                  </audio>";
  } else if (!is_null($post_info['video_id'])) {
    $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
    $result = mysqli_query($conn, "select video_type, video_path from video where id={$post_info['video_id']}");
    $row = mysqli_fetch_array($result);
    echo "<video controls ='controls' width='500' preload='auto'>
                                  <source src='{$row["video_path"]}'>
                                  </video>";
  }
  echo "  </div>
                              </div>";
}
echo "
        
      </div>
    </body>";
include_once 'footer.html';