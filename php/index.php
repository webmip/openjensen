<?php include("assets/_header.php"); ?>
<?php if($_SESSION['usertype_id'] >= 3) { ?><a href="index.create.php"><span class="label label-primary">Skriv en nyhet</span></a><?php } ?>
<?php
$Error->show();
$Success->show();

// Not yet converted to call Cobol, back-end

$news_result = pg_query("SELECT * FROM tbl_news ORDER BY news_id DESC");
while($news_row = pg_fetch_array($news_result))
{
	?>
	<h1><?php echo $news_row['news_title']; ?></h1>
	<p><?php echo $news_row['news_content']; ?></p>
	<span class="label label-info"><?php echo $news_row['news_date']; ?></span> <?php if($_SESSION['usertype_id'] >= 3) { ?><a href="index.delete.php?news_id=<?php echo $news_row['news_id']; ?>"><span class="label label-danger">Teamet</span></a><?php } ?>
	<hr>
	<?php
}

include("assets/_footer.php");
?>