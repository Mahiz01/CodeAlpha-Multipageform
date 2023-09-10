<?php
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $age=$_POST['age'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
  $city=$_POST['city'];
  $pincode=$_POST['pincode'];

  $host='localhost';
  $user='root';
  $pass='';
  $dbname='poi';
  $conn=mysqli_connect($host,$user,$pass,$dbname);
  $sql="INSERT INTO lk(name,age,email,contact,city,pincode) values('$name','$age','$email','$contact','$city','$pincode')";
  mysqli_query($conn,$sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style>
    body {
  font-family: Arial, sans-serif;
}

.survey-container {
  max-width: 600px;
  margin: 0 auto;
  
  padding: 20px;
  border: 1px double black;
  background-color: lightskyblue;
}

.page {
  display: none;
}

.page h1 {
  font-size: 24px;
}

button {
  margin-top: 10px;
}

button:first-child {
  margin-right: 10px;
}

 </style>
  <title>Multipage Survey Form</title>
</head>
<body>
  <div class="survey-container">
    <form id="survey-form" action="#" method="POST">
      <div class="page" id="page1">
        <h1>ENTER YOUR NAME</h1>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <button type="button" onclick="nextPage(2)">Next</button>
      </div>
      
      <div class="page" id="page2">
        <h1>ENTER YOUR AGE</h1>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required>
        <button type="button" onclick="prevPage(1)">Previous</button>
        <button type="button" onclick="nextPage(3)">Next</button>
       
      </div>
      <div class="page" id="page3">
        <h1>ENTER YOUR EMAIL</h1>
        <label for="age">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="button" onclick="prevPage(2)">Previous</button>

        <button type="button" onclick="nextPage(4)">Next</button>
       
      </div>
      <div class="page" id="page4">
        <h1>CONTACT INFO HERE...</h1>
        <label for="age">Contact:</label>
        <input type="number" id="contact" name="contact" required>
        <button type="button" onclick="prevPage(3)">Previous</button>
        <button type="button" onclick="nextPage(5)">Next</button>
       
      </div>
      <div class="page" id="page5">
        <h1>PLACE OF LIVING..</h1>
        <label for="age">City:</label>
        <input type="text" id="city" name="city" required>
        <button type="button" onclick="prevPage(4)">Previous</button>
        <button type="button" onclick="nextPage(6)">Next</button>
       
      </div>
      <div class="page" id="page6">
        <h1>PINCODE</h1>
        <label for="age">Pincode:</label>
        <input type="number" id="cpincode" name="pincode" required>
        <button type="button" onclick="prevPage(5)">Previous</button>
         <input type="submit" name="submit" value="Send Data">       
      </div>
    </form>
  </div>
  <script>
    let currentPage = 1;

function showPage(pageNumber) {
  const pages = document.querySelectorAll('.page');
  pages.forEach(page => page.style.display = 'none');
  
  const currentPageElement = document.getElementById(`page${pageNumber}`);
  currentPageElement.style.display = 'block';
  
  currentPage = pageNumber;
}

function nextPage(pageNumber) {
  if (pageNumber <= 6) {
    showPage(pageNumber);
  }
}

function prevPage(pageNumber) {
  if (pageNumber >= 1) {
    showPage(pageNumber);
  }
}

document.addEventListener('DOMContentLoaded', () => {
  showPage(currentPage);
});

  </script>
</body>
</html>
