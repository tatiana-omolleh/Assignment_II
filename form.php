<?php
class form{
    public function user_data_collection(){
        ?>
        <form action="process.php" method="POST">
            <label>Full Name</label><br>
            <input type="text" id="name" name="name" placeholder="Enter your Full Names"><br><br>
            <label>Email Address</label><br>
            <input type="email" id="email_address" name="email_address" placeholder="Enter your Email Address"><br><br>
            <label>Phone Number</label><br>
            <input type="text" id="contact" name="contact" placeholder="Enter your Phone Numbers"><br><br>
            <button type="submit" name="submit">Submit</button><br><br><br>
        </form>
        <form action="process.php" method="POST">
        <label>Show User Details</label><br>
        <input type="text" id="fullname" name="fullname" placeholder="Enter your Full Names"><br><br>
        <button type="submit" name="show">Show Details</button>
    </form>
        <?php
    }
}