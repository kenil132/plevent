<?php
include('vendor/autoload.php');
// include('includes/header.php');
session_start();
include('config/dbcon.php');
$css = file_get_contents('bill.css');
$html = '<header>
<table style="width:100%;" class="tbl">
    <tr>
        <th class="head">
            <p>PLEASANT EVENTS</p>
        </th>
        <th class="head1" style="width:25%;">
            <p>INVOICE</p>
        </th>
    </tr>
    <tr>
        <td>
            <h4 class="subhead">OFFICE :</h4>
            <h4 class="subhead">393,Opera Bussiness hub,<br>
                Lajamani chowk,motavarachha,<br>
                surat-394101</h4>
        </td>';
if (isset($_GET['rg_id'])) {
    $id = $_GET['rg_id'];
$query = "SELECT * from custom_event WHERE id='$id'";
$query_run = mysqli_query($con, $query);

if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $row) {
    }
}
        }
$html .= '
        <td>
            <h4 class="subhead1">Invoice : '.$id.'</h4>
            <h4 class="subhead1">
               
                Date: ' . $row['payment_date'] . '<br>
                Payment_id :' . $row['payment_id'] . '<br>
                Payment_status : done</h4>
        </td>
    </tr>
</table> <br>
<table style="width:100%;">
    <tr>
        <td>
            <p class="tab_2_p">Invoice to,</p>
            <b> Name : </b> ' . $row['cname'] . ' <!-- cname --> <br>
            <b> Phone no :</b> ' . $row['phoneno'] . ' <!-- phoneno --> <br>
            <b> Event Venue : </b>' . $row['venue'] . '<br>
            <b>Event held on:</b>
            ' . $row['date'] . '
        </td>
    </tr>
</table>
</header> <br>
<div class="sec_2_main">
<table style="width:100%; border: 1px black;">
    <tr>
        <th class="head_main">Description</th>
        <th class="head_main1">Amount</th>
    </tr>
    <tr>
    <td><p style="font-size:18px;">Your Event :- <b> ' . $row['ename'] . '</p> </b><br><br><br><br>
    Your Package :- <b> ' . $row['pname'] . ' </b> <br><br>
    Your Package includes : -
    <h5>'.$row['selected_service'].'</h5>
    <br>

        </td>
        <td style="text-align: center; font-size:20px;">₹' . $row['price'] . '</td>
    </tr>
    <tr>
    <td class="head_main" style="text-align: right;">Total payment :</td>
    <td class="head_main" style="text-align: center;"><b>₹' . $row['price'] . '</b></td>
    </tr>
</table>
</div>';
$html .= '
NOTE : -
<p style="color: rgb(83, 83, 83);">your amount is not refundable.</p>
<p style="color: rgb(83, 83, 83);">coustomer care no :(0261)936 1452</p>
<br><br><br><br><br><br><br><br><br><br>
<p style="text-align: center;color: rgb(152, 151, 151);">Thank your for Choosing us.</p>';
$mpdf = new \Mpdf\mpdf();
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html, 2);
$file=time().'.pdf';
$mpdf->Output($file,'D');
// $mpdf->Output('test.pdf','F');
?>