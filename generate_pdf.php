<?php
require('fpdf.php'); // Include the FPDF library

// Function to generate the PDF
function generatePDF($data)
{
    // Create a new PDF document
    $pdf = new FPDF();
    $pdf->AddPage();

    // Set font
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'TABLE BANKING HISTORY', 0, 1, 'C');
    $pdf->Ln(10);

    // Add table header
    $pdf->Cell(60, 10, 'Name', 1);
    $pdf->Cell(60, 10, 'Contribution Amount', 1);
    $pdf->Cell(60, 10, 'Date', 1);
    $pdf->Ln();

    // Add table data
    foreach ($data as $row) {
        $pdf->Cell(60, 10, $row['name'], 1);
        $pdf->Cell(60, 10, $row['contribution_amount'], 1);
        $pdf->Cell(60, 10, $row['date_column'], 1);
        $pdf->Ln();
    }

    // Output the PDF
    $pdf->Output('D', 'table_banking.pdf');
}

// Include the database configuration
require_once 'db_config.php';

// Fetch member contributions from the database
$query = "SELECT * FROM table_banking";
$result = mysqli_query($conn, $query);

$contributions = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $contributions[] = $row;
    }
}

// Call the function to generate the PDF
generatePDF($contributions);
?>
