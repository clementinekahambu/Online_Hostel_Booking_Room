

<div class="container" id="catalogue">
 
  <div class="row">

    <?php 
                      $query=mysqli_query($con,"select * from catalogue_images order by id desc");
                      $n=1;
                      while($row=mysqli_fetch_array($query))
                      {
                        
                          ?>
    <div class="col-md-4">
      <div class="row" style="padding:5px;">
        <div class="col-md-12 mb-2">
          <img src="images/<?php echo $row['image']; ?>" class="d-block w-100" alt="..." style="border-radius:5px;">
        </div>
      </div>
    </div>
    
                           

   

    <?php $n++; } ?>
    
    
 
          
        </div>