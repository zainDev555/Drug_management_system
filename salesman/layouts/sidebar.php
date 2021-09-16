 <!-- Sidebar -->
 <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
        
        <a href="./index.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span>Dashboard </span>
          </a>
          <a href="./medicine.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-medkit fa-fw me-3"></i><span>all Medicine </span>
          </a>
          <a href="./sales.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-money-bill-wave-alt fa-fw me-3"></i><span>Sales</span>
          </a>
          <a href="./return.php" class="list-group-item list-group-item-action py-2 ripple ">
            <i class="fas fa-undo fa-fw me-3"></i><span>Return</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action bg-info text-white py-2 ripple ">
            salesman city : <?php echo  $_SESSION['city'];?></span>
          </a>
          <a href="#" class="list-group-item list-group-item-action bg-info text-white py-2 ripple ">
          branch : <?php echo  $_SESSION['branch_name'];?></span>
          </a>
         
        </div>
      </div>
    </nav>
    <!-- Sidebar -->
