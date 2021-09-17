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
        <a href="#" class="list-group-item list-group-item-action py-2 ripple bg-info text-white">
            <span> DMS</span>
          </a>
          <a href="./index.php" class="check_hover list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;" >Dashboard</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple bg-info text-white">
            <span> Access/add City daily sales</span>
          </a>
          <a href="./city_daily_sale.php" class="check_hover list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;" > daily sales </span>
          </a>
          <a href="./weeklysale.php" class="check_hover list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;"> weekly sales </span>
          </a>
          <a href="./monthlysale.php" class="check_hover list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;"> monthly/yearly  sales </span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple bg-info text-white">
            <span>find/Return city  sales</span>
          </a>
          <a href="./salesreturn.php" class="check_hover list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;">   return  </span>
          </a>
          <a href="#" class="list-group-item list-group-item-action py-2 ripple bg-info text-white">
            <span> Add stor Manager</span>
          </a>
          <a href="./StoreManager_add.php" class="check_hover list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-users fa-fw me-3"></i><span style="font-size: 12px!important;">Storemanager add  </span>
          </a>
          
      </div>
    </nav>
    <!-- Sidebar -->
    <?php
    include "../assets/js/_manage.php";
    ?>