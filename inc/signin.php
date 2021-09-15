<?php
/** 
 * RYUPANEL 
 * 
 * @package RyuJin-FrameWork
 * @version 1.
 * @author ryujinsoft.
 * 
 */
$private_key = 'PRIV8-RYUJINAPP';

if(isset($_POST['private_key']))
{
    $key = $_POST['private_key'];

    if($key == $private_key)
    {
        $_SESSION['ryupanel_login'] = sha1(session_id());

        echo "<script>window.location.href='?rp=welcome&".$_SESSION['ryupanel_login']."'; </script>";
        exit;
    }else{
        echo "<script>alert('wrong private key');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In </title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">
    <div class="flex flex-col min-h-screen min-w-screen justify-center items-center">
        <img src="https://shinryujin.net/assets/images/ryu-logo.png" class="w-36 mb-10 animate-pulse">
        <div class="bg-white w-2/6 p-5 rounded-sm shadow-lg">
            <header class="mb-5">
                <h1 class="text-xl">Login</h1>
            </header>
            <form method="POST">
                <div class="mb-3">
                    <label class="block mb-3">Private Key</label>
                    <input type="password" class="border-solid border-2 border-gray-200 rounded-sm p-2 w-full" name="private_key" id="private_key">
                </div>
                <div class="mb-3">
                    <button class="bg-gray-600 text-white items-center flex flex-col w-full justify-center rounded-sm p-3 font-bold">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>