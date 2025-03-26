<?php
include 'config.php';

// check if form is submitted
if(isset($_POST['submit'])){
    $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
    $question = mysqli_real_escape_string($conn,$_POST['question']);
    $answer = mysqli_real_escape_string($conn,$_POST['answer']);

    // check if the username exists in the database
    $query = "SELECT * FROM users WHERE firstname = '$firstname'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) == 0){
        echo "Username not found.";
    } else {
        $row = mysqli_fetch_assoc($result);
        // check if the security question and answer match the ones stored in the database
        if($question == $row['question'] && $answer == $row['answer']){
            $password = $row['password'];
            echo "Your password is: " . $password;
        } else {
            echo "Invalid security question or answer.";
        }
    }
}
?>

<!-- forgot password form -->
<form action="" method="POST">
    <label>Username:</label>
    <input type="text" name="firstname" required>
    <br>
    <label>Security Question:</label>
    <select name="question" required>
        <option value="">Select a question</option>
        <option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
        <option value="What is the name of your first pet?">What is the name of your first pet?</option>
        <option value="What is your favorite color?">What is your favorite color?</option>
    </select>
    <br>
    <label>Answer:</label>
    <input type="text" name="answer" required>
    <br>
    <input type="submit" name="submit" value="Submit">
</form>
