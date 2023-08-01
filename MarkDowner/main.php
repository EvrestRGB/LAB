<?php

// Get the user input
$title = readline("Enter the title: ");
$subtitle = readline("Enter the subtitle: ");
$content = readline("Enter the content: ");

// Create the Markdown file
$file = fopen("markdown.md", "w");

// Write the title to the file
fwrite($file, "# $title\n");

// Write the subtitle to the file
fwrite($file, "## $subtitle\n");

// Write the content to the file
fwrite($file, "**$content**\n");

// Close the file
fclose($file);

// Print a message to the user
echo "The Markdown file has been created successfully.\n";

?>
