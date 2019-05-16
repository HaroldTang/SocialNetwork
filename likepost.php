<?php
$user_id = $_POST['userid'];
$post_id = $_POST['postid'];

$conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
$query_result = mysqli_query($conn, "select * from likepost where post_id={$post_id} and user_id={$user_id}");

if (mysqli_num_rows($query_result) >= 1) {
  echo "<script> alert('Already liked!');window.location.href=document.referrer;</script>";
} else {
  $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
  mysqli_query($conn, "insert into likepost(post_id, user_id) values ($post_id, $user_id)");
  echo "<script> alert('Like Success');window.location.href=document.referrer;</script>";
}
