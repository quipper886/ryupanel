<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
	<title>:: RyuPanel ::</title>
</head>
<body class="bg-gray-100">
<style>
    input[type="radio"] + label span {
        transition: background .2s,
        transform .2s;
    }

    input[type="radio"] + label span:hover,
    input[type="radio"] + label:hover span{
        transform: scale(1.2);
    } 

    input[type="radio"]:checked + label span {
        background-color: #3490DC; //bg-blue
        box-shadow: 0px 0px 0px 2px white inset;
    }

    input[type="radio"]:checked + label{
        color: #3490DC; //text-blue
    }
</style>
	<div class="container w-2/3 mx-auto bg-gray-500 p-10 min-h-screen h-auto shadow-inner rounded-lg">
    <header class="flex flex-row w-full items-center">
        <img src="https://shinryujin.net/assets/images/ryu-logo.png" class="w-24 animate-bounce">
        <hgroup class="ml-8">
            <h1 class="text-xl font-bold tracking-widest animate-pulse">RyuFramework</h1>
            <h4><?=getApp();?></h4>
        </hgroup>
    </header>
    <nav class="w-full flex flex-row my-5 bg-gray-100 rounded-lg shadow-lg">
        <a href="?rp=home" class="hover:bg-blue-500 hover:rounded-l-lg rounded-l-lg py-3 px-6 bg-blue-400">Home</a>
        <a href="?rp=configuration" class="hover:bg-yellow-500 py-3 px-6 bg-yellow-400">Config</a>
        <a href="?rp=reset" class="hover:bg-red-500 py-3 px-6 bg-red-400">Reset</a>
        <a href="?rp=statistic" class="hover:bg-green-500 py-3 px-6 bg-green-400">Statistic</a>
        <a href="?rp=visit" class="hover:bg-indigo-500 py-3 px-6 bg-indigo-400">Visit</a>
        <a href="?rp=logout" class=" hover:bg-red-700 py-3 px-6 text-red-500 ">Logout</a>
    </nav>