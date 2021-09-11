 <!-- Sidebar -->
 <style>
   .check_hover{
    text-overflow: ellipsis;
  overflow: hidden;
  white-space: nowrap;
   }
   .check_hover:hover{
    text-overflow: revert;
  overflow: hidden;
  white-space: nowrap;
   }
 </style>
 <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4" >
      
        <a href="./index.php" class="check_hover list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;" >City  sales </span>
          </a>
          <a href="./countrysale.php" class="check_hover list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;">Country sales </span>
          </a>
          <a href="./cityreturn.php" class="check_hover list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;">City return </span>
          </a>
          <a href="./country-sale-return.php" class="check_hover list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;">country   return  </span>
          </a>
         
          
         
        </div>
      </div>
    </nav>
    <!-- Sidebar -->
    <?php
    include "../assets/js/_manage.php";
    ?>