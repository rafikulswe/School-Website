<div class="container-fluid content_full">
    <div class="row">
        <div class="col-md-3 sidebar">
            <div class="sidebar_user">
                <img src="uploads/<?= $_SESSION['photo'];?>" alt="user" class="img-responsive"/>
                <h4><?= $_SESSION['name'];?></h4>
                <p><i class="fa fa-circle"></i> online</p>
            </div>
            <div class="menu">
                <h2>MAIN NAVIGATION</h2>
                <ul>
                    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <?php if($_SESSION['role']<=1){?>
                    <li><a href="all-user.php"><i class="fa fa-user"></i> User</a></li>
                    <?php }?>
                    <li><a href="all-banner.php"><i class="fa fa-image"></i> Banner</a></li>
                    <li><a href="all-photos.php"><i class="fa fa-cubes"></i> Gallery</a></li>
                    <li><a href="all-pages.php"><i class="fa fa-pencil"></i> All Page Content</a></li>
                    <li><a href="all-news.php"><i class="fa fa-flag"></i> Notice Board</a></li>
                    <li><a href="all-mess.php"><i class="fa fa-comments"></i> Contact Massage</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
                </ul>
            </div>
        </div><!--sidebar end-->