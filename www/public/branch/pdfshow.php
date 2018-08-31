<?php
// We'll be outputting a PDF
header('Content-type: application/pdf;charset=utf8;');

// It will be called downloaded.pdf
//header('Content-Disposition: attachment; filename="downloaded.pdf"');

// The PDF source is in original.pdf
readfile('./pdf/doc.pdf');
?>