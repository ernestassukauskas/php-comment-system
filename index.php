<?php include 'session.php';?>
<?php include 'pagination.php';?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Comment System</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  
  <style type="text/css">
    .comment {
      margin-bottom: 20px;
    }

    .user {
      font-weight: bold;
      color: black;
    }
    .time {
      color: gray;
    }

    .userComment {
      color: #000;
    }

    #registerModal input, #logInModal input {
      margin-top: 10px;
    }
  </style>
</head>
<body>
<div class="modal" id="registerModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Registration Form</h5>
        </div>
        <div class="modal-body">
          <input type="text" id="userName" class="form-control" placeholder="Your Name">
          <input type="email" id="userEmail" class="form-control" placeholder="Your Email">
          <input type="password" id="userPassword" class="form-control" placeholder="Password">
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" id="registerBtn">Register</button>
          <button class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

<div class="modal" id="logInModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Log In Form</h5>
      </div>
      <div class="modal-body">
        <input type="email" id="userLEmail" class="form-control" placeholder="Your Email">
        <input type="password" id="userLPassword" class="form-control" placeholder="Password">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="loginBtn">Log In</button>
        <button class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="container" style="margin-top:50px;">
  <div class="row">
    <div class="col-md-12" align="right">
      <?php
      if (!$loggedIn)
          echo '
            <button class="btn btn-primary" data-toggle="modal" data-target="#registerModal">Register</button>
            <button class="btn btn-success" data-toggle="modal" data-target="#logInModal">Log In</button>
          ';
      else
          echo '
            <a href="logout.php" class="btn btn-warning">Log Out</a>
          ';
      ?>
      </div>
    </div>
    <div class="row" style="margin-top: 20px;margin-bottom: 20px;">
      <div class="col-md-12" align="center">
        <h2>Topic</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <textarea class="form-control" id="mainComment" placeholder="Add Comment" cols="30" rows="2"></textarea><br>
        <button style="float:right" class="btn-primary btn"  id="addComment">Add Comment</button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h4 style="color: #006600;"><b id="numComments"><?php echo $numComments ?> Comments</b></h4>
        <div class="userComments"></div>
      </div>
    </div>
</div>

<script src="http://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script type="text/javascript">
  var commentID = 0, max = <?php echo $numComments ?>;

  $(document).ready(function () {
    $("#addComment").on('click', function () { 
      var comment;
        comment = $("#mainComment").val();

      if (comment.length > 1) {
        $.ajax({
          url: 'index.php',
          method: 'POST',
          dataType: 'text',
          data: {
            addComment: 1,
            comment: comment,
            commentID: commentID
          }, success: function (response) {
            max++;
            $("#numComments").text(max + " Comments");

              $(".userComments").prepend(response);
              $("#mainComment").val("");
              commentID = 0;
          }
        });
      } else
          alert('Please Check Your Inputs');
    });

    $("#registerBtn").on('click', function () {
      var name = $("#userName").val();
      var email = $("#userEmail").val();
      var password = $("#userPassword").val();

      if (name != "" && email != "" && password != "") {
        $.ajax({
          url: 'index.php',
          method: 'POST',
          dataType: 'text',
          data: {
            register: 1,
            name: name,
            email: email,
            password: password
          }, success: function (response) {
            if (response === 'failedEmail')
              alert('Please insert valid email address!');
            else if (response === 'failedUserExists')
              alert('User with this email already exists!');
            else
              window.location = window.location;
          }
        });
      } else
          alert('Please Check Your Inputs');
    });

    $("#loginBtn").on('click', function () {
      var email = $("#userLEmail").val();
      var password = $("#userLPassword").val();

      if (email != "" && password != "") {
        $.ajax({
          url: 'index.php',
          method: 'POST',
          dataType: 'text',
          data: {
            logIn: 1,
            email: email,
            password: password
          }, success: function (response) {
            if (response === 'failed')
              alert('Please check your login details!');
            else
              window.location = window.location;
          }
        });
      } else
          alert('Please Check Your Inputs');
    });

    getAllComments(0, max);
  });

  function getAllComments(start, max) {
    if (start > max) {
      return;
    }

    $.ajax({
      url: 'index.php',
      method: 'POST',
      dataType: 'text',
      data: {
        getAllComments: 1,
        start: start
      }, success: function (response) {
        $(".userComments").append(response);
        getAllComments((start+20), max);
      }
    });
  }

</script>
</body>
</html>