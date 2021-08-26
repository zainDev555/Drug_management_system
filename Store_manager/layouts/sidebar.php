 <!-- Sidebar -->
 <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4" >
      
        <a href="./index.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;" >Salesman daily sales </span>
          </a>
          <a href="./weeklysale.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;">Salesman weekly sales </span>
          </a>
          <a href="./monthlysale.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;">Salesman monthly/yearly  sales </span>
          </a>
          <a href="./salesreturn.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span style="font-size: 12px!important;">Salesmans  return  </span>
          </a>
          <a href="./SalesMan_add.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-users fa-fw me-3"></i><span style="font-size: 12px!important;">Salesman add  </span>
          </a>
            <p><?php echo "You handle ".$_SESSION['branch_name']." branch in ".$_SESSION['city'];?></p>
        </div>
      </div>
    </nav>
    <!-- Sidebar -->
    <?php
    include "../assets/js/_manage.php";
    ?>