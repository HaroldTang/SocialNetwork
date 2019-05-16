<?php

function get_user_info($username)
{
    $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
    $query_result = mysqli_query($conn, "select * from user where username = '$username'");
    $user_info = mysqli_fetch_assoc($query_result);
    $row = mysqli_num_rows($query_result);
    $post_num = mysqli_query($conn, "select count(*) as count from post where post_user = '{$user_info['id']}'");
    $post_num = mysqli_fetch_assoc($post_num);
    $friend_num = mysqli_query($conn, "select count(*) as count from relation where user_id = '{$user_info['id']}' and status = 'friend'");
    $friend_num = mysqli_fetch_assoc($friend_num);
    $conn->close();
    return array($user_info, $row, $post_num, $friend_num);
}

function get_search_info($user_id)
{
    $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
    $query_result = mysqli_query($conn, "select * from user where id = '$user_id'");
    $user_info = mysqli_fetch_assoc($query_result);
    $row = mysqli_num_rows($query_result);
    $conn->close();
    return array($user_info, $row);
}

function get_relationship($user_id, $friend_id)
{

    $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
    $query_result = mysqli_query($conn, "select status from relation where user_id = '$user_id' and friend_id = '$friend_id'");
    if (null == mysqli_fetch_assoc($query_result)) {
        $flag = 0;
    } else {
        $query_result1 = mysqli_query($conn, "select status from relation where user_id = '$friend_id' and friend_id = '$user_id'");
        if (null == mysqli_fetch_assoc($query_result1)) {
            $flag = 1;
        } else {
            $flag = 2;
        }
    }
    return $flag;
}

function get_request($input_id)
{
    $conn = mysqli_connect('localhost', 'root', 'root', 'SocialNetwork');
    $query_result = mysqli_query($conn, "select username from relation join user on relation.user_id=user.id where friend_id = $input_id and status ='pending'");
    if (0 == mysqli_fetch_row($query_result)) {
        return null;
    } else {
        $request_user_return = array();
        while ($request_user = mysqli_fetch_assoc($query_result)) {
            $request_user_return[] = $request_user['username'];
        }
        return $request_user_return;
    }
}
