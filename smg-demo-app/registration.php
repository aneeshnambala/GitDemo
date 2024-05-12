<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>User Registration</h2>
    <form method="post" name="user_registration" id="user_registration" enctype="multipart/form-data" action="user_registration.php">
        <label for="full_name">Full Name</label>
        <input type="text" name="full_name" id="full_name" placeholder="Full Name" required />
        <label for="about_me" name="about_me" id="about_me" >About Me</label>
        <textarea name="about_me" id="about_me"type="text" name="" id=""></textarea>
        <label for="profile_pic" name="profile_pic" id="profile_pic" ></label>
        <input type="file" name="profile_pic" id="profile_pic"/>
        <input type="submit" name="save" id="save" value="Save" />
    </form>
</body>
</html>
