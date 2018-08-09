<!DOCTYPE html>
<html>
<head>
	<title>Category Project</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<?php include("connection.php"); ?>
	<div class ="container" style="background-color: white">
	    <div class="jumbotron" style="background-color: lightgreen">
	        <center><h1>Welcome</h1></center>
	    </div>    
	    <nav class="navbar navbar-inverse">
	        <div class="container-fluid">
	            <div class="navbar-header">
	                <a class="navbar-brand" href="home.php">Your Choice</a>
	            </div>
	            <ul class="nav navbar-nav">
	                <li class="active"><a href="home.php">Home</a></li>
	                <li class="dropdown">
				        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Category
				        <span class="caret"></span></a>
				        <ul class="dropdown-menu">
				          <li><a href="categoryForm.php">Add</a></li>
				          <li><a href="categoryTable.php">View</a></li>
				        </ul>
				    </li>
					<li class="dropdown">
				        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Subcategory
				        <span class="caret"></span></a>
				        <ul class="dropdown-menu">
				          <li><a href="subCategoryForm.php">Add</a></li>
				          <li><a href="subCategoryView.php">View</a></li>
				        </ul>
				    </li>
	                <li><a href="categoryAbout.php">About</a></li>
	                <li><a href="categoryHelp.php">Help</a></li>
	            </ul>
	            <div class="search-container">
    <form class="navbar-form navbar-right" role="search">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>
  </div>
	        </div>
	    </nav>
