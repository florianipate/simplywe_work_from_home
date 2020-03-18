<?php require_once '../cms/overall/header.php';?>

<style>
    th{
        font-size: 18px;
        background-color: #d3d3d3;
        color: #252A4E;
        padding: 3px 10px 3px 10px;
        border: none;
        border: 2px solid #ffffff;
        min-width: 20px;
    }
    td {
        display: table-cell;
        vertical-align: inherit;
        background-color:#f7f7f7;
        border: 2px solid #ffffff;
        padding: 3px 10px 3px 10px;
    }
    .clickable{
        cursor: pointer;
    }

</style>
<h2>
    Venues List
</h2>
<table>
    <tr>
        <th>#</th>
        <th>Venue Ref:</th>
        <th>Name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Delete</th>
    </tr>
<?php
  $venues = DB::getInstance()->get('demo_venue_details', array('id', '=', 1));
foreach($venues->results() as $venue){
    echo $venue->results()->id;
//    echo '<tr><td>'.$result->results()->id.'</td><td>'.$result->results()->venue_ref.'</td><td><a href="venue_info_page.php?id='.$result->results()->id.'">'.$result->results()->venue_name.'</a></td><td>'.$result->results()->venue_email.'</td><td><td class="clickable">Delete Venue</td></tr>';
}

?>
<!--
//    <tr>
//        <td>1</td>
//        <td>V1</td>
//        <td><a href="venue_info_page.php?V1">Venue One</a></td>
//        <td>+44 (1234) 123 456</td>
//        <td>venueone@email.com</td>
//        <td class="clickable">Delete Venue</td>
//    </tr>
//    <tr>
//        <td>2</td>
//        <td>V2</td>
//        <td><a href="venue_info_page.php?V2">Venue Two</a></td>
//        <td>+44 (1234) 123 456</td>
//        <td>venuetwo@email.com</td>
//        <td class="clickable">Delete Venue</td>
//    </tr>
//    <tr>
//        <td>3</td>
//        <td>V3</td>
//        <td><a href="venue_info_page.php?V3">Venue Three</a></td>
//        <td>+44 (1234) 123 456</td>
//        <td>venuethree@email.com</td>
//        <td class="clickable">Delete Venue</td>
//    </tr>
-->

</table>