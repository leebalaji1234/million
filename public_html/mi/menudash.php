<?php
session_start();
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
include_once 'config.php';
if(!isset($_SESSION['user']))
{
	header("Location: index.php");
}
$res=mysql_query("SELECT * FROM login WHERE userid=".$_SESSION['user']);
$userRow=mysql_fetch_array($res);
?>
<nav class="navbar navbar-default top-navbar" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <a class="navbar-brand" href="index.php">Million Dollar Drawings</a> </div>
  <ul class="nav navbar-top-links navbar-right">   
    <!-- /.dropdown -->    
    <!-- /.dropdown -->   
    <!-- /.dropdown --> 
    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false"> <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i> </a>
      <ul class="dropdown-menu dropdown-user">       
        <li><a href="logout.php?logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a> </li>
      </ul>
      <!-- /.dropdown-user --> 
    </li>
    <!-- /.dropdown -->
  </ul>
</nav>
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
      <li> <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i> Dashboard</a> </li>
      <li> <a href="#"><i class="fa fa-desktop"></i>Messages  </a>
        <ul class="nav nav-third-level">
          <li> <a href="addmessages.php">Add Messages </a> </li>
          <li> <a href="allmessages.php">View Messages </a> </li>
        </ul>
      </li>
      <li> <a href="#"><i class="fa fa-desktop"></i> Theme Management</a>
        <ul class="nav nav-third-level">
          <li> <a href="addtheme.php">ADD Theme</a> </li>
          <li> <a href="alltheme.php">View Theme</a> </li>
         
        </ul>
      </li>
       <li> <a href="#"><i class="fa fa-desktop"></i> User Management</a>
        <ul class="nav nav-third-level">
          <li> <a href="adduser.php">Add User</a> </li>
          <li> <a href="alluser.php">View User</a> </li>
         
        </ul>
      </li>
       <li> <a href="#"><i class="fa fa-desktop"></i> Content Management</a>
        <ul class="nav nav-third-level">
          <li> <a href="addcontent.php">ADD Content</a> </li>
          <li> <a href="allcontent.php">View Content</a> </li>
         
        </ul>
        </li>
         <li> <a href="#"><i class="fa fa-desktop"></i>Block Modules</a>
        <ul class="nav nav-third-level">
          <li> <a href="allentrant.php">Entrant Modules</a> </li>
          <li> <a href="allsponsor.php">Sponsor Modules</a> </li>
          <li> <a href="allvolunteer.php">Volunteer Modules</a> </li>
          <li> <a href="alldrawing.php">Drawing Modules</a> </li>
        </ul>
        </li>
      
    </ul>
  </div>
</nav>
