<?php 
// $sql = "SELECT * FROM notes ORDER BY id DESC";
$sql = "SELECT * FROM notes ORDER BY id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
// Unpaginated/not limited
$notes_all = $stmt->fetchAll();

// --- Pagination ---
// Total results
$total_results = $stmt->rowCount();
// Number of records for each page
$results_per_page = 10;
// Number of pages
$number_of_pages = ceil($total_results/$results_per_page);

// Get the page number and retrieve records
if(!isset($_GET['page'])){
  $page = 1;
} else{
  $page = $_GET['page'];
}

// Offset point
$offset = ($page-1)*$results_per_page;

// Retrieve results for current page
$sql = "SELECT * FROM notes ORDER BY id DESC LIMIT $offset, $results_per_page";

$query_current = $pdo->prepare($sql);
$query_current->execute();
$notes = $query_current->fetchAll();

// --- Search ---

$sql = "SELECT * FROM `notes` WHERE `title` LIKE ? ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
  
$stmt->execute(["%".$_POST['search']."%"]);  
$results = $stmt->fetchAll();