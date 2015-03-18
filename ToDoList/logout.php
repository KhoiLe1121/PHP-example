<?php
#Khoi Le, Section AA, Homework 5
#This page log the user out and clear all session
#then redirect back to start.php

session_start();
session_destroy();
session_regenerate_id(TRUE); 
header("Location: start.php");
?>