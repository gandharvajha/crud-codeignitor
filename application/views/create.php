<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Application - Create User</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css' ?>"/>
</head>
<body>

<div class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="#" class="navbar-brand">CRUD APPLICATION</a>
    </div>
</div>

<div class="container" style="padding-top:10px;">
    <h3>Create User</h3>
    <hr>
    <form method="post" name="createUser"  action="<?php echo base_url().'index.php/User/create'; ?>">
      <div class="row">
      
        <div class="col-md-6">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php set_value('name'); ?>" class="form-control"/>
                <?php echo form_error('name'); ?>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="<?php set_value('email'); ?>" class="form-control"/>
                <?php echo form_error('email'); ?>
            </div>
            <div class="form-group mt-5">
               <button class="btn btn-primary">Create</button>
               <a href="<?php echo base_url().'index.php/user/index' ?>" class="btn-secondary btn">Cancel</a>
            </div>
        </div>
       
      </div>
    </form>
</div>
    
</body>
</html>