<?php



$dbname = "hostels";
$username = "root";
$password = "";
$servername ="localhost";

$conn = new mysqli($servername,$username,$password,$dbname);

if( $conn->connect_error){
	die("connection failure". $conn->connect_error);
}

$sql = "

create table Owner_details(
	Owner_name varchar(20),
	Phone_number varchar(10),
	Email_ID varchar(30),
	primary key(Phone_number)
);
";

$sql .= "
create table area(
	pincode varchar(6),
	city varchar(20),
	no_of_hostels int,
	locality varchar(20),
	primary key(pincode)
);
";
$sql .= "
create table Hostel(
	ID int not null auto_increment primary key,
	H_name varchar(20),
	Pincode char(6),
	Type varchar(10),
	Curfew time,
	Fees int,
	Phone_number varchar(10),
	Capacity int,
	foreign key(Pincode) references Area(Pincode),
	foreign key(Phone_number) references Owner_details(Phone_number)

);
";
$sql .= "
create table Room_types(
	Room_capacity int,
	Fees int,
	Wifi boolean,
	No_of_rooms int,
	ID int,
	foreign key(ID) references Hostel(ID)

);";

// $result = mysql_query($sql1,$sql2,$sql3);

if($conn->multi_query($sql)){
	echo "Table created";
}
else{
	echo "error creating table" . $conn->error;
}
// $conn->query($sql3);
// $conn->query($sql4);
// $conn->query($sql5);


$conn->close();

  ?>
