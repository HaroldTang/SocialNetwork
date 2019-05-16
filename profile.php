<?php
include_once 'query.php';
include_once 'header.html';
$username = $_GET['username'];

list($user_info, $num_row, $post_num, $friend_num) = get_user_info($username);
$password_hidden = "";
$password = $user_info['password'];
for ($i = 0; $i < strlen($password); $i++) {
    $password_hidden = $password_hidden . "*";
}
if ($num_row == 1) {
    echo "
  <div class='modal fade' id='change_username' tabindex='-1' role='form' aria-hidden='true'>
      <div class='modal-dialog modal-dialog-centered' role='form'>
          <div class='modal-content'>
              <div class='modal-header'>
                  <h5 class='modal-title'>Change Username</h5>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                  </button>
              </div>
              <form action='submit.php' method='POST'>
                  <div class='modal-body'>
                      <div class='container'>
                          <div class='col-10 align-self-center'>
                              <label for='New username'>Please Input New Username</label>
                              <input type='hidden' name='action' value='edit_username'>
                              <input type='hidden' name='username' value='$username'>
                              <input type='text' class='form-control' name='new_username'>
                              <small class='form-text text-muted'>Please make sure different from current
                                  username.</small>
                          </div>
                      </div>
                  </div>
                  <div class='modal-footer'>
                      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                      <button type='submit' class='btn btn-primary'>Save changes</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
  
  <div class='modal fade' id='change_password' tabindex='-1' role='form' aria-hidden='true'>
      <div class='modal-dialog modal-dialog-centered' role='form'>
          <div class='modal-content'>
              <div class='modal-header'>
                  <h5 class='modal-title'>Change Password</h5>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                  </button>
              </div>
              <form action='submit.php' method='POST'>
                  <div class='modal-body'>
                      <div class='container'>
                          <div class='col-10 align-self-center'>
                              <label for='original_password'>Original Password</label>
                              <input type='hidden' name='action' value='edit_password'>
                              <input type='hidden' name='username' value='$username'>
                              <input type='password' class='form-control' name='original_password'>
                              <label for='new_password' style='margin-top: 10px'>New Password</label>
                              <input type='password' class='form-control' name='new_password' placeholder='Password'>
                              <input type='password' class='form-control' name='new_password_again' placeholder='Reconfirm Your Password'>
                              <small class='form-text text-muted'>Please make sure different from current password.</small>
                          </div>
                      </div>
                  </div>
                  <div class='modal-footer'>
                      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                      <button type='submit' class='btn btn-primary'>Save changes</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <div class='modal fade' id='change_age' tabindex='-1' role='form' aria-hidden='true'>
      <div class='modal-dialog modal-dialog-centered' role='form'>
          <div class='modal-content'>
              <div class='modal-header'>
                  <h5 class='modal-title'>Change Age</h5>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                  </button>
              </div>
              <form action='submit.php' method='POST'>
                  <div class='modal-body'>
                      <div class='container'>
                          <div class='col-10 align-self-center'>
                              <label for='New Age'>Please Input New Age</label>
                              <input type='hidden' name='action' value='edit_age'>
                              <input type='hidden' name='username' value='$username'>
                              <input type='number' class='form-control' name='new_age'>
                          </div>
                      </div>
                  </div>
                  <div class='modal-footer'>
                      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                      <button type='submit' class='btn btn-primary'>Save changes</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <div class='modal fade' id='change_city' tabindex='-1' role='form' aria-hidden='true'>
      <div class='modal-dialog modal-dialog-centered' role='form'>
          <div class='modal-content'>
              <div class='modal-header'>
                  <h5 class='modal-title'>Change City</h5>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                  </button>
              </div>
              <form action='submit.php' method='POST'>
                  <div class='modal-body'>
                      <div class='container'>
                          <div class='col-10 align-self-center'>
                              <label for='change city'>Please Input City</label>
                              <input type='hidden' name='action' value='edit_city'>
                              <input type='hidden' name='username' value='$username'>
                              <input type='text' class='form-control' name='city'>
                          </div>
                      </div>
                  </div>
                  <div class='modal-footer'>
                      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                      <button type='submit' class='btn btn-primary'>Save changes</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

  <div class='modal fade' id='change_real_name' tabindex='-1' role='form' aria-hidden='true'>
      <div class='modal-dialog modal-dialog-centered' role='form'>
          <div class='modal-content'>
              <div class='modal-header'>
                  <h5 class='modal-title'>Change Real Name</h5>
                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                  </button>
              </div>
              <form action='submit.php' method='POST'>
                  <div class='modal-body'>
                      <div class='container'>
                          <div class='col-10 align-self-center'>
                              <label for='change real name'>Please Input Real Name</label>
                              <input type='hidden' name='action' value='edit_real_name'>
                              <input type='hidden' name='username' value='$username'>
                              <input type='text' class='form-control' name='real_name'>
                          </div>
                      </div>
                  </div>
                  <div class='modal-footer'>
                      <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                      <button type='submit' class='btn btn-primary'>Save changes</button>
                  </div>
              </form>
          </div>
      </div>
  </div>
        <body class = 'grad d-flex flex-column m-0'>
            <div class='navbar' id='navigate-bar' style='background-color: white; height: 100px;'>
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
        
                        <a href='profile.php?username={$user_info['username']}'>My Profile</a>&nbsp;
                    </nav>
        
                </div>
            </div>
            <div class='container-fluid m-1'>
              <div class='row'>
                <div class='col-1'></div>
                <div class='col-10 bg-white' style='height:620px'>
                  <h1 style='text-align: center;margin:20px'>Welcome! {$user_info['username']}!</h1>
                  <div class='container margin:50px'>
                  <div class='row mb-3 bg-light mt-5'>   
                    <div class='col-4' style='text-align: center; font-size: 30px'><b>Username:</b></div>
                    <div class='col-5' style='text-align: center; font-size: 30px'>{$user_info['username']}</div>
                    <div class='col-2' style='text-align: end'>
                      <button class='btn btn-lg btn-success' data-toggle='modal' data-target='#change_username'>Edit</button>
                    </div>
                  </div>
                  <div class='row mb-3 bg-light mt-5' >
                    <div class='col-4' style='text-align: center; font-size: 30px'><b>Password:</b></div>
                    <div class='col-5' style='text-align: center; font-size: 30px'>$password_hidden</div>
                    <div class='col-2' style='text-align: end'>
                      <button class='btn btn-lg btn-success' data-toggle='modal' data-target='#change_password'>Edit</button>
                    </div>
                  </div>
                  <div class='row mb-3 bg-light mt-5' >
                      <div class='col-4' style='text-align: center; font-size: 30px'><b>Age:</b></div>
                      <div class='col-5' style='text-align: center; font-size: 30px'>{$user_info['age']}</div>
                      <div class='col-2' style='text-align: end'>
                        <button class='btn btn-lg btn-success' data-toggle='modal' data-target='#change_age'>Edit</button>
                      </div>
                  </div>
                  <div class='row mb-3 bg-light mt-5' >
                      <div class='col-4' style='text-align: center; font-size: 30px'><b>City:</b></div>
                      <div class='col-5' style='text-align: center; font-size: 30px'>{$user_info['city']}</div>
                      <div class='col-2' style='text-align: end'>
                        <button class='btn btn-lg btn-success' data-toggle='modal' data-target='#change_city'>Edit</button>
                      </div>
                  </div>
                  <div class='row mb-3 bg-light mt-5' >
                      <div class='col-4' style='text-align: center; font-size: 30px'><b>Real Name:</b></div>
                      <div class='col-5' style='text-align: center; font-size: 30px'>{$user_info['real_name']}</div>
                      <div class='col-2' style='text-align: end'>
                        <button class='btn btn-lg btn-success' data-toggle='modal' data-target='#change_real_name'>Edit</button>
                      </div>
                  </div>
                </div>
              </div>
                <div class='col-1'></div>
              </div>
            </div>
            
            ";
} else {
    echo "<script type = 'text/javascript'> window.location.href = 'login.html' </script>";
}
include_once 'footer.html';
