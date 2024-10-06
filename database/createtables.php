<?php

$path = $_SERVER['DOCUMENT_ROOT'];
require_once $path . "/attendance_app/database/database.php";
function clearTable($dbo, $tabName)
{
  $c = "delete from :tabname";
  $s = $dbo->conn->prepare($c);
  try {
    $s->execute([":tabname" => $tabName]);
  } catch (PDOException $oo) {
  }
}
$dbo = new Database();
$c = "create table student_details
(
    id int auto_increment primary key,
    roll_no varchar(20) unique,
    name varchar(50)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>student_details created");
} catch (PDOException $o) {
  echo ("<br>student_details not created");
}

$c = "create table course_details
(
    id int auto_increment primary key,
    code varchar(20) unique,
    title varchar(50),
    credit int
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_details created");
} catch (PDOException $o) {
  echo ("<br>course_details not created");
}


$c = "create table faculty_details
(
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>faculty_details created");
} catch (PDOException $o) {
  echo ("<br>faculty_details not created");
}


$c = "create table session_details
(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique (year,term)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>session_details created");
} catch (PDOException $o) {
  echo ("<br>session_details not created");
}



$c = "create table course_registration
(
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id,course_id,session_id)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_registration created");
} catch (PDOException $o) {
  echo ("<br>course_registration not created");
}

$c = "create table course_allotment
(
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id,course_id,session_id)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>course_allotment created");
} catch (PDOException $o) {
  echo ("<br>course_allotment not created");
}

$c = "create table attendance_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id,course_id,session_id,student_id,on_date)
)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
  echo ("<br>attendance_details created");
} catch (PDOException $o) {
  echo ("<br>attendance_details not created");
}

$c = "insert into student_details
(id,roll_no,name)
values
(1, '21341A1271', 'Maram Yashwanth'),
(2, '21341A1272', 'Mekathoti Archana'),
(3, '21341A1273', 'Menda Usha'),
(4, '21341A1274', 'Meraka Hinesh'),
(5, '21341A1275', 'Mohammad Gaffar'),
(6, '21341A1276', 'Mohammad Yaseen'),
(7, '21341A1277', 'Moksha Kothari'),
(8, '21341A1278', 'Mudidana Sukumar'),
(9, '21341A1279', 'Mygapu Kamal Tej'),
(10, '21341A1281', 'Nagireddy Pranaykumar'),
(11, '21341A1282', 'Nagireddy Sai Gowtham'),
(12, '21341A1283', 'Nakka Ronald Sudheer'),
(13, '21341A1284', 'Nallamilli Satyabhavani'),
(14, '21341A1285', 'Naram Bharat Kumar'),
(15, '21341A1286', 'Nemalapuri Naveen'),
(16, '21341A1287', 'Nunna Tarun Venkata Sai'),
(17, '21341A1290', 'Parimi Hitesh Mohan'),
(18, '21341A1291', 'Pedaredla Sarath Kumar'),
(19, '21341A1292', 'Pilla Raghavendra Sai'),
(20, '21341A1293', 'Pinninti Swarnalatha'),
(21, '21341A1295', 'Pitchika Venkata Sai'),
(22, '21341A1296', 'Pitta Sai Jagadeesh'),
(23, '21341A1298', 'Polireddi Indhumathi'),
(24, '21341A1299', 'Potnuru Ajith'),
(25, '21341A12A1', 'Potnuru Sravan Kumar'),
(26, '21341A12A2', 'Pujari Hiranmayee Panda'),
(27, '21341A12A3', 'Punnana Thaviti Naidu'),
(28, '21341A12A4', 'Ramba Haritha'),
(29, '21341A12A5', 'Rayapati Vyshnavi'),
(30, '21341A12A6', 'Rayavarapu Siri Pranathi'),
(31, '21341A12A7', 'Reddy Susmitha'),
(32, '21341A12A8', 'Sanapathi Pavan Kumar'),
(33, '21341A12A9', 'Sappa Prakash'),
(34, '21341A12B0', 'Sasapu Dhanalakshmi'),
(35, '21341A12B1', 'Sasapu Vamsikumar'),
(36, '21341A12B2', 'Shaik Reshma'),
(37, '21341A12B3', 'Shantati Praneeth'),
(38, '21341A12B4', 'Srungavarapu Sai Srinivas'),
(39, '21341A12B5', 'Sunkara Chandra Sekhar'),
(40, '21341A12B6', 'Sunnamuddi Sai Krishna'),
(41, '21341A12B7', 'Tentu Yamuna'),
(42, '21341A12B8', 'Thandranghi Jaswanth'),
(43, '21341A12B9', 'Tirumalaraju Amrutha'),
(44, '21341A12C0', 'Tumpilli Santosh Kumar'),
(45, '21341A12C1', 'Turpati Ravindra'),
(46, '21341A12C2', 'Vakada Ramya'),
(47, '21341A12C3', 'Vakkalagadda Venkata Satya Vinay'),
(48, '21341A12C4', 'Vangapandu Sarada'),
(49, '21341A12C5', 'Varri Swathi'),
(50, '21341A12C6', 'Varshita Vyda'),
(51, '21341A12C7', 'Vysyaraju Pranesh Raju'),
(52, '21341A12C9', 'Yalamanchili Mukesh'),
(53, '21341A12D0', 'Yandamuri Pradeep'),
(54, '22345A1208', 'Simhadri Phani Harshitha'),
(55, '22345A1209', 'Kanisetti Mohan Krishna'),
(56, '22345A1210', 'Bhupathi Tharunteja'),
(57, '22345A1212', 'Pericharla Prabhu Varma')
";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}


$c = "insert into faculty_details
(id,user_name,password,name)
values
(1,'AKR','123','Dr Ajith Kumar Rout'),
(2,'VR','123','Dr Vasudha RAni'),
(3,'KJS','123','Dr K JayaSri'),
(4,'PS','123','Dr P Srihari'),
(5,'KA','123','Dr K Aravind'),
(6,'PP','123','Mrs P Padmavathi')";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}


$c = "insert into session_details
(id,year,term)
values
(1,2023,'III'),
(2,2023,'IV')";

$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}


$c = "insert into course_details
(id,title,code,credit)
values
(1,'Data Structures','CS303',3),
(2,'Digital Logic Design','CS304',4),
(3,'Discrete Mathematical Structures','CS305',3),
(4,'Database Management Systems','IT304',3),
(5,'Data Communication Systems','IT305',3),
(6,'Object oriented Programming through Java','IT306',4)";
$s = $dbo->conn->prepare($c);
try {
  $s->execute();
} catch (PDOException $o) {
  echo ("<br>duplicate entry");
}
clearTable($dbo, "course_registration");

$c = "insert into course_registration
  (student_id,course_id,session_id)
  values
  (:sid,:cid,:sessid)";
$s = $dbo->conn->prepare($c);
for ($i = 1; $i <= 57; $i++) {

  for ($cid = 1; $cid <= 6; $cid++) {
    try {
      $s->execute([":sid" => $i, ":cid" => $cid, ":sessid" => 1]);
    } catch (PDOException $pe) {
    }
  }
}
clearTable($dbo, "course_allotment");
$c = "insert into course_allotment
  (faculty_id,course_id,session_id)
  values
  (:fid,:cid,:sessid)";
$s = $dbo->conn->prepare($c);
for ($i = 1; $i <= 6; $i++) {
  $cid = $i;
  try {
    $s->execute([":fid" => $i, ":cid" => $cid, ":sessid" => 1]);
  } catch (PDOException $pe) {
  }
}
?>