
<?php
$database= new Connect();
$conn = $database->dataConnect;
?>
<div class="title">Nhóm Danh mục</div>
<form action="" onsubmit = "return false" class ='post-data-categoty'>
    <div class="menu-category">
        <?php 
        $sql="SELECT * FROM NHOM_DANHMUC";
        $valueSql = $conn->query($sql)->fetch_all();
        foreach($valueSql as $category){
        echo '<div class="catalog-list">
            <div class="handle">
                <span>'.$category[1].'</span>
                <div class="action">
                    <div class="action-items delete">
                        <ion-icon name="trash-outline"></ion-icon>
                    </div>
                    <div class="action-items change">
                        <ion-icon name="open-outline"></ion-icon>
                    </div>
                    <div class="action-items see-category">
                        <ion-icon name="chevron-down-outline"></ion-icon>
                    </div>
                </div>
            </div>
            <div class="category-list">
                <div class="category-items">
                    <span> Áo 1</span>
                    <div class="action">
                        <div class="action-items change">
                            <ion-icon name="open-outline"></ion-icon>
                        </div>
                        <div class="action-items delete">
                            <ion-icon name="trash-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                <div class="category-items">
                    <span> Áo 1</span>
                    <div class="action">
                        <div class="action-items change">
                            <ion-icon name="open-outline"></ion-icon>
                        </div>
                        <div class="action-items delete">
                            <ion-icon name="trash-outline"></ion-icon>
                        </div>
                    </div>
                </div>
                <div class="category-items">
                    <span> Áo 1</span>
                    <div class="action">
                        <div class="action-items change">
                            <ion-icon name="open-outline"></ion-icon>
                        </div>
                        <div class="action-items delete">
                            <ion-icon name="trash-outline"></ion-icon>
                        </div>
                    </div>
                </div>
    
                <div class="category-items last add-category-items">
                    <span></span>
                    <ion-icon name="add-circle-outline"></ion-icon>
                </div>
    
            </div>
        </div>';
        }    
        ?>
    </div>
    <div class="add-catalog">
               <span></span>
               <ion-icon name="add-circle-outline"></ion-icon>
    </div>
</form>

<script src="<?php echo _WEB_ROOT?>/admin/assets/public/js/home.js"></script>
<script src="<?php echo _WEB_ROOT?>/admin/assets/public/js/category.js"></script>
<script src="<?php echo _WEB_ROOT?>/admin/assets/public/js/categoryItem.js"></script>