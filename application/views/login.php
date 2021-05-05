<div class="body_container">
<div id="container">
	<h1>Login</h1>

	<div id="formbody">
		<form action="<?php echo base_url('welcome/login');?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="column">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-input"/>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Password</label>
                    <input type="password" name="password" class="form-input"/>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <button type="submit" class="but-on form-input">Submit</button>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <a href="<?php echo base_url('welcome/signup');?>" style="color:red;">Don't have Account. Sign up?</a>
                </div>
            </div>
        </form>
	</div>
</div>
</div>
</body>
</html>