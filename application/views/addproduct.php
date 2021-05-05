<div id="bodyrow">
   <div class="row-container">
        <div class="cols1">
	        <h1>Dashboard</h1>
        </div>
        <div class="cols2">
            <a style="font-style: italic;color: #666;">WELCOME[ <?php echo $this->session->userdata('user_name');?> ]</a>
        </div>
        <div class="cols2">
            <button class="log-but" onclick="window.location.href='<?php echo base_url('welcome/logout');?>'">Logout</button>
        </div>
    </div>
    <div class="body-row">
        <div class="body-head">
            <div class="body-cols1">
	            <!-- <h1>Add Product</h1> -->
            </div>
            <div class="body-cols2">
                <button class="form-button small-button bg-green" onclick="window.location.href='<?php echo base_url('welcome/dashboard');?>'">Go Back</button>
            </div>
        </div>
    </div>
    <div class="module-content-section" style="width: max-content;
    margin: auto;">
    <div class="body_container" style="margin-top:0px;text-align:center;">
    <!-- <div id="container">
	<div id="formbody"> -->
    <h1>ADD PRODUCT</h1>
		<form action="<?php echo base_url('welcome/add');?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="column">
                    <label>Product Name</label>
                    <input type="text" name="name" class="form-input" required/>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Product Description</label>
                    <textarea rows="5" name="description" class="form-input" required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <label>Upload Image</label>
                    <input type="file" name="files" class="form-input" required/>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <button type="submit" class="but-on form-input">Submit</button>
                </div>
            </div>
            <!-- <div class="row">
                <div class="column">
                    <a href="<?php echo base_url('welcome/signup');?>" style="color:red;">Don't have Account. Sign up?</a>
                </div>
            </div> -->
        </form>
	</div>
<!-- </div>
</div> -->
    </div>
</div>