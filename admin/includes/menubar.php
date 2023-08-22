<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $admin['firstname'].' '.$admin['lastname']; ?></p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">REPORTS</li>
      <li><a href="home.php"><i class=></i> <span>Dashboard</span></a></li>
     
          <li class="treeview">
        <a href="#">
          <i ></i>
          <span>Orders</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="sales.php"><i class="fa fa-circle-o"></i>Pick Up</a></li>
          
          
          
          <li><a href="sales3.php"><i class="fa fa-circle-o"></i>Delivery</a></li>
          
          
        </ul>
      </li>
     <!--   <li><a href="sales.php"><i class="fa fa-circle-o"></i> Pending</a></li>
          
          
          
          <li><a href="sales3.php"><i class="fa fa-circle-o"></i>Out for Delivery</a></li>
          <li><a href="sales4.php"><i class="fa fa-circle-o"></i>Paid and Done</a></li> -->
      
      <li class="treeview">
        <a href="#">
          <i ></i>
          <span>Customization Orders</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="custom_sale.php"><i class="fa fa-circle-o"></i>Pick Up</a></li>
          
          
          <li><a href="custom_sale1.php"><i class="fa fa-circle-o"></i>Delivery</a></li>
          <!-- <li><a href="custom_sale2.php"><i class="fa fa-circle-o"></i>Delivered</a></li> -->
          
          
        </ul>
      </li>
      <li><a href="sales2.php"><i class=></i> <span>Sales Report</span></a></li>
        
   <!--       <li class="treeview">
        <a href="#">
          <i ></i>
          <span>Chair</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="custom_chair_sale.php"><i class="fa fa-circle-o"></i>Pending</a></li>
          
          
          <li><a href="custom_chair_sale1.php"><i class="fa fa-circle-o"></i> Our for Delivery</a></li>
          <li><a href="custom_chair_sale2.php"><i class="fa fa-circle-o"></i>Delivered</a></li>
          
          
        </ul>
      </li> -->
    <!--      <li class="treeview">
        <a href="#">
          <i ></i>
          <span>Table</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="custom_table_sale.php"><i class="fa fa-circle-o"></i> Pending</a></li>
          
          
          <li><a href="custom_table_sale1.php"><i class="fa fa-circle-o"></i>Our for Delivery</a></li>
          <li><a href="custom_table_sale2.php"><i class="fa fa-circle-o"></i>Delivered</a></li>
          
          
        </ul>
      </li> -->
      <li class="header">MANAGE</li>
         <li class="treeview">
        <a href="#">
          <i ></i>
          <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="users.php"><i class="fa fa-circle-o"></i> <span>Customer List</span></a></li>
          
          <li><a href="staff.php"><i class="fa fa-circle-o"></i> Staff List</a></li>
          <!-- <li><a href="adminlist.php"><i class="fa fa-circle-o"></i> Admin List</a></li> -->
          
        </ul>
      </li>
      
     <li><a href="products.php"><i></i> <span>Products</span></a></li>
     
           <li class="treeview">
        <a href="#">
          <i ></i>
          <span>Inventory</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="products_inventory.php"><i class="fa fa-circle-o"></i> <span>Product Inventory</span></a></li>
          <li><a href="inventory.php"><i class="fa fa-circle-o"></i> <span>Raw Materials</span></a></li>
          
          <li><a href="stockin_history.php"><i class="fa fa-circle-o"></i>Stock in history</a></li>
          <li><a href="stockout_history.php"><i class="fa fa-circle-o"></i>Stock out history</a></li>
          
          
        </ul>
      </li>
          <li class="treeview">
        <a href="#">
          <i ></i>
          <span>Plant Stand</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          
          
           <li><a href="customization.php"><i class="fa fa-circle-o"></i>Layer</a></li>
           <li><a href="platform.php"><i class="fa fa-circle-o"></i>Platform Quantity</a></li>
           <li><a href="color.php"><i class="fa fa-circle-o"></i>Colors</a></li>
         
          
        </ul>
      </li>
          <li class="treeview">
        <a href="#">
          <i ></i>
          <span>Chair</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          
          
           <li><a href="shape.php"><i class="fa fa-circle-o"></i>Shape</a></li>
           <li><a href="height.php"><i class="fa fa-circle-o"></i>Height</a></li>
            <li><a href="chair_color.php"><i class="fa fa-circle-o"></i>Colors</a></li>
         
          
        </ul>
      </li>
         <li class="treeview">
        <a href="#">
          <i ></i>
          <span>Table</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          
          
           <li><a href="table.php"><i class="fa fa-circle-o"></i>Shape</a></li>
           
            <li><a href="table_color.php"><i class="fa fa-circle-o"></i>Colors</a></li>
         
          
        </ul>
      </li>

        
      
      <li class="header">MAINTENANCE</li>
    <!--   <li><a href="category.php"><i class=></i> <span>Category</span></a></li>
      <li><a href="carousel.php"><i class=></i> <span>Carousel</span></a></li>
      <li><a href="info.php"><i class=></i> <span>System Informations</span></a></li> -->
        <li class="treeview">
        <a href="#">
          <i ></i>
          <span>Maintenance</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="category.php"><i class="fa fa-circle-o"></i> Category</a></li>
          
          
          <li><a href="banner.php"><i class="fa fa-circle-o"></i> Carousel</a></li>
          <li><a href="info.php"><i class="fa fa-circle-o"></i> System Informations</a></li>
          
        </ul>
      </li> 

     
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>