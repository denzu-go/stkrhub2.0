<?php
$zip = new ZipArchive();
$filename = "./simple.zip";

if ($zip->open($filename, ZipArchive::CREATE) !== TRUE) {
    exit("Cannot open <$filename>\n");
}

// Content to be added to the text file
$textContent = "This is a simple text file in the zip archive.\n";

// Add the text file to the zip archive
$zip->addFromString("simple.txt", $textContent);

$zip->close();
echo "Simple zip archive created successfully. <br>";

// Provide a download link for the zip file
echo '<a href="' . $filename . '" download>Download Zip</a>';
?>
