<?php
	// session_start();
	// require "conn.php";
	// error_reporting(0);	
	// var_dump($_SESSION["ID"]);
	// if($_SESSION["ID"] == ""){
	// 	header("Location: index.php");
	// }else{
	// }
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="margin: 30px;">

			<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">თანამშრომლები</th>
      <th scope="col">თანამდებობა</th>
      <th scope="col">პირადობის ნომერი</th>
      <th scope="col">ვადა</th>
      <th scope="col">კალენდარი</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>Otto</td>
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button></td>
</td>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
<!--         <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
 -->        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <main>
  <div class="calendar">
    <div class="month">
      <h1>January 2015</h1>
    </div>
    <div class="day-name cf">
      <div class="col">Sa</div>
      <div class="col">Mo</div>
      <div class="col">Tu</div>
      <div class="col">We</div>
      <div class="col">Th</div>
      <div class="col">Fr</div>
      <div class="col">Su</div>
    </div>
    <div class="day-number cf">
      <div class="col empty"></div>
      <div class="col empty"></div>
      <div class="col empty"></div>
      <div class="col past">1</div>
      <div class="col past">2</div>
      <div class="col past">3</div>
      <div class="col past">4</div>
      <div class="col past">5</div>
      <div class="col past">6</div>
      <div class="col active">7</div>
      <div class="col">8</div>
      <div class="col">9</div>
      <div class="col">10</div>
      <div class="col">11</div>
      <div class="col">12</div>
      <div class="col">13</div>
      <div class="col">14</div>
      <div class="col">15</div>
      <div class="col">16</div>
      <div class="col">17</div>
      <div class="col">18</div>
      <div class="col">19</div>
      <div class="col">20</div>
      <div class="col">21</div>
      <div class="col">22</div>
      <div class="col">23</div>
      <div class="col">24</div>
      <div class="col">25</div>
      <div class="col">26</div>
      <div class="col">27</div>
      <div class="col">28</div>
      <div class="col">29</div>
      <div class="col">30</div>
      <div class="col">31</div>
    </div>
  </div>
</main>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>Otto</td>
      <td>Otto</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>Otto</td>
      <td>Otto</td>
      <td>the Bird</td>
    </tr>
  </tbody>
</table>
<script
  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"
  ></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
<style type="text/css">
  main {
  width: 100%;
  max-width: 960px;
  margin: auto;
}

.calendar {
  margin: auto;
  margin-top: 15px;
  width: 450px;
  height: 450px;
  padding: 20px;
  display: block;
  position: relative;
  z-index: 2;
  background-color: #e9e9e9;
  border-radius: 4px;
  /*box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.35);*/
  overflow: hidden;
}
.calendar .month {
  width: 100%;
  height: 50px;
  display: block;
  position: relative;
  z-index: 3;
}
.calendar .month h1 {
  margin: 0;
  text-transform: uppercase;
  text-align: center;
  font-size: 20px;
  font-weight: 600;
  color: #2c3e50;
}
.calendar .day-name {
  width: 100%;
  display: block;
}
.calendar .day-name .col {
  color: #aaa;
  font-weight: 600;
  cursor: auto;
}
.calendar .day-number {
  width: 100%;
  height: 75px;
  display: block;
}

.col {
  width: 38px;
  height: 38px;
  float: left;
  margin: 10px;
  font-weight: 500;
  position: relative;
  z-index: 4;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  cursor: pointer;
  transition: background-color 0.3s cubic-bezier(0.82, 0.01, 0.77, 0.78), color 0.2s linear, 0.2s box-shadow 0.2s linear;
}
.col.empty {
  cursor: auto;
}
.col.past {
  color: #bbb;
}
.col.past::before {
  display: block;
  position: absolute;
  z-index: 5;
  top: 50%;
  left: 50%;
  -webkit-transform: translateY(-45%) translateX(-50%) rotateZ(-45deg);
          transform: translateY(-45%) translateX(-50%) rotateZ(-45deg);
  content: "";
  height: 2px;
  width: 35%;
  border-radius: 2px;
  background-color: #e74c3c;
}
.col.active {
  background-color: #2ecc71;
  color: #fff;
  font-weight: 700;
  font-size: 18px;
  box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2);
}
.col.active.past {
  background-color: rgba(243, 156, 18, 0.25);
}
</style>
</html>