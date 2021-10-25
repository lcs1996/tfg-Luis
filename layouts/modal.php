<!-- Modal -->
<div class="modal fade" id="mdl<?php echo $row['id'];?>" 
tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" 
        data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" 
        data-dismiss="modal">Close</button>
        <a href='pages/editImage.php?id=<?php echo $row['id']; ?>'>
          <button type="button" class="btn btn-success">
          Edit</button>
        </a>
        <a href='pages/deleteImage.php?id=<?php echo $row['id']; ?>'>
          <button type="button" class="btn btn-danger">
          Delete</button>
        </a>
      </div>
    </div>
  </div>
</div>