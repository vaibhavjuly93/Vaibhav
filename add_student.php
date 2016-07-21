<?php
 ob_start();
 include('header.php');
 $uploadOk = 1;
 if(isset($_REQUEST['add'])) {
 
    /**** Adding user into users table start****/
	$table = 'users';

	$column = 'username, email, gender, password,dob,user_role';

	
	$values = "'".mysql_real_escape_string($_REQUEST['username'])."','".mysql_real_escape_string($_REQUEST['email'])."','".$_REQUEST['gender']."','".md5($_REQUEST['password'])."','".mysql_real_escape_string($_REQUEST['dob'])."','".mysql_real_escape_string($_REQUEST['user_role'])."'"; 
	if($_REQUEST['username'] == 'username'){
    
    echo 'user already exits';

	} 
	else{

            $userID    = add($table, $column, $values);
         }

           if (isset($_FILES["user_image"]["name"])) {
         $user_image = pathinfo(basename($_FILES["user_image"]["name"], PATHINFO_EXTENSION));
         $type=$_FILES["user_image"]["type"];
				if($type=='image/jpeg' || $type=='image/png' || $type=='image/jpg' || $type=='gif'){
			   

				$fileName   = $userID . '_' . $_FILES["user_image"]["name"];
			            $path       = USER_IMAGE_PATH_ADMIN . $fileName;
			            if(move_uploaded_file($_FILES["user_image"]["tmp_name"], $path))
			            {
			            		                 $table  = 'users';
			            $column = array(
			                'user_image' => $fileName
			            );
			            $where  = 'uid = ' . mysql_real_escape_string($userID) . '';
			            update_query($table, $column, $where);
				/**** Adding user into users table end ****/
			              header('Location: users.php');
				
			}
			            
			            }
			            else
			            {
			            	echo 'file not uploaded'; 
			            	
			            }
			           
          }
 }
 
?>
    <div class="content-wrapper">
        <section class="content-header">
			<section class="content-header">
				 <div class="row">
					<div class="col-md-6">
						<div class="content-header">
							<h1>Add Student</h1>
							<?php
if ($uploadOk == 0) {
?>
							
							<!--<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-ban"></i> Alert!</h4>
								'Sorry, only JPG, JPEG, PNG & GIF files are allowed.'
							  </div>-->
							
							<?php
}
?>
						</div>
					</div>
				</div>
			</section>
			<section class="content" id="user-edit-page" style="background:#fff;">
				<div class="row">
					<div class="col-md-12">
						<div class="col-md-12">
							<div class="box-info">								
								<form class="form-box" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" id="lonewolfform" enctype="multipart/form-data">
									<div class="msg-succ"><?php if(isset($message)) print $message; ?></div>
									<div class="form-group">
										<label for="institute_image">Student Image</label>
										<input type="file" name="institute_image" class="form-control">
									</div>
									<div class="form-group">
										<label for="institute_name">Enter Student Name</label>
										<input type="text" name="institute_name" placeholder="Institute Name" class="form-control" id="institute_name" value="" required><br>							
									</div>
									<div class="form-group">
										<label for="history_institute">Enter Date Of Birth</label>
										<input type="textarea" name="history_institute" placeholder="History Of Institute" class="form-control" id="history_institute" required><br>
									</div>
									<div class="form-group">
										<label for="gender">Select Gender</label>
                                        <input type="radio" name="gender"
                                        <?php if (isset($gender) && $gender=="female") echo "checked";?>
                                        value="female" checked>Female
                                        <input type="radio" name="gender"
                                        <?php if (isset($gender) && $gender=="male") echo "checked";?>
                                        value="male">Male
                                        <input type="radio" name="gender"
                                        <?php if (isset($gender) && $gender=="others") echo "checked";?>
                                        value="male">Others
                                    </div>
									<div class="form-group">
										<label for="type_institute">Enter Institute Name</label>
										<select>
  											<option value="Educational">Educational</option>
  											<option value="Academic">Academic</option>
  											<option value="Govenment">Govenment</option>
  											<option value="University">University</option>
										</select>
									</div>
									<div class="form-group">
										<label for="courses">Courses</label>
										<select>
  											<option value="Mathematics">Mathematics</option>
  											<option value="Biology">Biology</option>
  											<option value="Commerce">Commerce</option>
  											<option value="Arts">Arts</option>
										</select>
									</div>
									<div class="form-group">
										<label for="class">Class</label>
										<select>
  											<option value="Playgroup">Playgroup</option>
  											<option value="Nursery">Nursery</option>
  											<option value="Playgroup">U.K.G</option>
  											<option value="Nursery">1</option>
  											<option value="2">2</option>
  											<option value="3">3</option>
  											<option value="4">4</option>
  											<option value="5">5</option>
  											<option value="6">6</option>
  											<option value="7">7</option>
  											<option value="8">8</option>
  											<option value="9">9</option>
  											<option value="10">10</option>
  											<option value="11">11</option>
  											<option value="12">12</option>
										</select>
									</div>
									<div class="form-group">
										<label for="allocated_subject">Subjects</label>
										<select>
										    <option value="Select Subject">Select Subject</option>
  											<option value="Class 9">Class 9</option>
  											<option value="Hindi">Hindi</option>
  											<option value="English">English</option>
  											<option value="Math">Math</option>
  											<option value="C.B.S.E.">C.B.S.E.</option>
  											<option value="Hindi">Hindi</option>
  											<option value="English">English</option>
  											<option value="Science">Science</option>
										</select>										
									</div>
									<div class="form-group">
										<label for="institute_name">Enter Father's Name</label>
										<input type="text" name="institute_name" placeholder="Institute Name" class="form-control" id="institute_name" value="" required><br>
										</div>
									<div class="form-group">
										<label for="institute_name">Enter Mother's Name</label>
										<input type="text" name="institute_name" placeholder="Institute Name" class="form-control" id="institute_name" value="" required><br>
									</div>
									<div class="form-group">
										<label for="email">Enter Email</label>
										<input type="email" name="email" placeholder="email" class="form-control" id="email" required><br>
									</div>
									<div class="form-group">
										<label for="phone">Enter Phone Number</label>
										<input type="integer" name="phone" placeholder="Phone Number" class="form-control" id="phone" required>
									</div>
									<div class="form-group">
										<label for="type_institute">Last School Attended</label>
										<select>
  											<option value="Educational">Educational</option>
  											<option value="Academic">Academic</option>
  											<option value="Govenment">Govenment</option>
  											<option value="University">University</option>
										</select>
									</div>
									<div class="form-group">
										<label for="type_institute">Performance In Last Class</label>
										<select>
  											<option value="A+">A+</option>
  											<option value="A">A</option>
  											<option value="B">B</option>
  											<option value="C">C</option>
  											<option value="D">D</option>
  											<option value="E">E</option>
										</select>
									</div>
                             <!-- <div class="input-group">
					<label for="dob">DOB</label>
					
              			
                                  <div class="input-group">
					
					<input type="text" name="dob" class="form-control" id="dob" placeholder="Date of Birth" READONLY required>
					 <label class="input-group-addon btn" for="dob">
				       <span class="fa fa-calendar"></span>
				    </label> 
              			</div>
                                </div>-->

       								
									<div class="t-marg">
										<button class="btn btn-primary" type="submit" name="add">Save</button>
										<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" class="btn btn-warning" name="update">Cancel</a>
									</div>		
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
        </section>
    </div>
<?php
 include('footer.php');
?>
