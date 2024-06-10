<?php
include('header.php');
if (!isset($_SESSION['user'])) {
    header('location:login.php');
    exit;
}

require('fpdf/fpdf.php'); // Include FPDF library for generating PDF

$qry2 = mysqli_query($con, "SELECT * FROM tbl_movie WHERE movie_id='" . $_SESSION['movie'] . "'");
$movie = mysqli_fetch_array($qry2);

$s = mysqli_query($con, "SELECT * FROM tbl_shows WHERE s_id='" . $_SESSION['show'] . "'");
$shw = mysqli_fetch_array($s);

$t = mysqli_query($con, "SELECT * FROM tbl_theatre WHERE id='" . $shw['theatre_id'] . "'");
$theatre = mysqli_fetch_array($t);

$ttm = mysqli_query($con, "SELECT * FROM tbl_show_time WHERE st_id='" . $shw['st_id'] . "'");
$ttme = mysqli_fetch_array($ttm);

$sn = mysqli_query($con, "SELECT * FROM tbl_screens WHERE screen_id='" . $ttme['screen_id'] . "'");
$screen = mysqli_fetch_array($sn);

// Assuming the seat and date details are coming from the booking form
$seat = $_POST['seat']; // Assuming seat info is sent via POST method from the form
$date = $_POST['date'];

// Generate the PDF ticket
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, 'Movie Ticket', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, 'Movie Name: ' . $movie['movie_name'], 0, 1);
$pdf->Cell(0, 10, 'Theatre: ' . $theatre['name'] . ', ' . $theatre['place'], 0, 1);
$pdf->Cell(0, 10, 'Show Time: ' . date('h:i A', strtotime($ttme['start_time'])) . ' ' . $ttme['name'] . ' Show', 0, 1);
$pdf->Cell(0, 10, 'Date: ' . date('d-M-Y', strtotime($date)), 0, 1);
$pdf->Cell(0, 10, 'Seat: ' . $seat, 0, 1);

$pdf->Output('D', 'ticket.pdf'); // Downloadable PDF

include('footer.php');
?>
