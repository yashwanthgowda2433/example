
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
	            <h1>Products</h1>
            </div>
            <div class="body-cols2">
                <button class="form-button small-button bg-green" onclick="window.location.href='<?php echo base_url('welcome/addproduct');?>'">Add Products</button>
            </div>
        </div>
    </div>
    <div class="module-content-section">
	
	        <div class="table-container">
					<table>
						<tbody>
                            <tr>
								<th><a>Product ID </a></th>
								<th><a>Image </a></th>
								<th><a>Product Name</a></th>
								<th><a>Product Description </a></th>
								<th><a>User Name </a></th>
								<th><a>Time</a></th>
									
								<th>Action</th>
						    </tr>
						  <?php foreach($products as $product){
							//   $id = md5($product['product_id']);
							//   $crop = strlen($id);
							  ?>
						    <tr>
								<td><?php echo md5($product['product_id']);?></td>
								<td><img src="<?php echo base_url($product['p_img']);?>" style="width:150px;"/></td>
								<td><?php echo $product['p_name'];?></td>
								<td><?php echo $product['p_description'];?></td>
								<td><?php echo $product['user_name'];?></td>
								<td><?php echo $product['Timestamp'];?></td>
                                
								<td>
									<a href="<?php echo base_url('welcome/edit/'.$product['product_id']);?>" class="" title="Edit Membership"><i class="fas fa-pencil-alt" style=" font-size:1.3em; position:relative; top:2px; color:#ffb800;" aria-hidden="true">Edit</i></a>
									<a href="<?php echo base_url('welcome/delete/'.$product['product_id']);?>" style="color:red;cursor:pointer;margin-left:10px;">Delete</a>
									
									
								</td>
						  </tr>
                          <?php }?>
						</tbody>
                    </table>
						
             </div>

    </div>
</div>
</div>
</body>
</html>