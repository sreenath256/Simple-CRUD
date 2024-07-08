<?php
session_start();

function getUsers()
{
    return json_decode(file_get_contents(__DIR__ . '/users.json'), true);
}

function getUserById($id)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) return $user;
    }
    return null;
}

function createUser($data)
{
    $users = getUsers();
    $lastUser = end($users);
    $newId = $lastUser ? $lastUser['id'] + 1 : 1;
    $data['id'] = $newId;

    $users[] = $data;
    $result = file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
    echo $result;
    if ($result === false) {
        $_SESSION['err-message'] = "Error writing to file. Please check file permissions.";
        $_SESSION['err-message_type'] = 'danger';
    } else {
        $_SESSION['message'] = "User created successfully!";
        $_SESSION['message_type'] = 'success';
        return $newId;
    }
}

function updateUser($id, $data)
{

    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $users[$i] = array_merge($user, $data);
        }
    }

    $result = file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
    if ($result === false) {
        $_SESSION['message'] = "Error writing to file . Please check file permissions.";
        $_SESSION['message_type'] = 'danger';
    } else {
        $_SESSION['message'] = "User updated successfully!";
        $_SESSION['message_type'] = 'success';
    }
}

function deleteUser($id)
{

    $users = getUsers();
    foreach ($users as $i => $user) {
        if ($user['id'] == $id) {
            $username=$user['username'];
            unset($users[$i]);
            echo '<pre>';
            var_dump($users);
            echo '</pre>';
            $result = file_put_contents(__DIR__ . '/users.json', json_encode(array_values($users), JSON_PRETTY_PRINT));

            if ($result === false) {
                $_SESSION['message'] = "Error deleting from file . Please check file permissions.";
                $_SESSION['message_type'] = 'danger';
            } else {
                $_SESSION['message'] = "$username user deleted successfully!";
                $_SESSION['message_type'] = 'success';
                header('Location:index.php');
            }
            return;
        }
    }
    $_SESSION['message'] = "User not found!";
    $_SESSION['message_type'] = 'danger';
}
